<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
  public function handleChat(Request $request)
    {
        $message = $request->input('message');

        // Logic phản hồi (ví dụ: trả lời tạm thời)
        $reply = $this->getBotReply($message);

        return response()->json(['reply' => $reply]);
    }

    private function getBotReply($message)
    {
        // Logic trả lời tự động đơn giản
        if (stripos($message, 'hello') !== false || stripos($message, 'hi') !== false) {
            return 'Chào bạn! Tôi có thể giúp gì cho bạn?';
        }

        return 'Xin lỗi, tôi chưa hiểu câu hỏi của bạn. Vui lòng thử lại!';
    }
}
