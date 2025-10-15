<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maimtext;
use App\Models\Catalog;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class BaseController extends Controller
{

    public function getIndex()
    {
        $catalogs = Catalog::whereNull('parent_id')->get();
        $world = 'home';
        
        return view('index', compact('catalogs', 'world'));
    }
    
    public function getUrl($url = 'about')
    {
        $catalogs = Catalog::whereNull('parent_id')->get();
        $maintext = Maimtext::where('url', $url)->first();
        $world = $url;
        
        return view('article', compact('url', 'maintext', 'catalogs', 'world'));
    }

    public function handleContactForm(Request $request)
    {
        // Логирование входящих данных для отладки
        \Log::info('Получена заявка с формы:', $request->all());
        
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.max' => 'Имя не должно превышать 255 символов.',
            'phone.required' => 'Поле "Телефон" обязательно для заполнения.',
            'phone.max' => 'Номер телефона не должен превышать 20 символов.',
            'message.max' => 'Сообщение не должно превышать 1000 символов.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Создание заявки в базе данных
            $contactRequest = ContactRequest::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'message' => $request->message,
                'status' => 'new',
            ]);

            // Логирование заявки
            \Log::info('Новая заявка с формы обратной связи:', [
                'id' => $contactRequest->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'message' => $request->message,
                'timestamp' => now(),
            ]);

            // Отправка email уведомления
            try {
                \Log::info('Попытка отправки email уведомления...');
                
                Mail::raw(
                    "Новая заявка с сайта:\n\n" .
                    "Имя: {$contactRequest->name}\n" .
                    "Телефон: {$contactRequest->phone}\n" .
                    "Сообщение: " . ($contactRequest->message ?: 'Не указано') . "\n" .
                    "Дата: {$contactRequest->created_at}",
                    function ($message) use ($contactRequest) {
                        $message->to('sermyazhko.alesya@mail.ru')
                                ->subject('Новая заявка с сайта - ' . $contactRequest->name);
                    }
                );
                
                \Log::info('Email уведомление успешно отправлено');
            } catch (\Exception $e) {
                \Log::error('Ошибка при отправке email уведомления: ' . $e->getMessage());
                \Log::error('Стек ошибки: ' . $e->getTraceAsString());
            }

            return redirect()->back()->with('success', 'Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.');

        } catch (\Exception $e) {
            \Log::error('Ошибка при сохранении заявки: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Произошла ошибка при отправке заявки. Попробуйте еще раз.')
                ->withInput();
        }
    }
}
