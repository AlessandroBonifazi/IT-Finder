<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\User;



class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = config('messages');
        foreach ($messages as $message){
            $new_message = new Message();
            $new_message->content = $message['content'];
            $new_message->email = $message['email'];
            $new_message->user_name = $message['user_name'];
            $new_message->save();
        }
    }
}
