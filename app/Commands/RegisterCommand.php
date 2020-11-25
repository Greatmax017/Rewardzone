<?php

namespace App\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use App\User;
use App\Notifications\EmailNotifyAll;
use Hash;

class RegisterCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "register";

    /**
     * @var string Command Description
     */
    protected $description = "Register Command to confirm your email address in cryptobitbybit trading database. Use for Private Notification only. Please register only in a private message with the bot. Dont expose your account details when in a group.  Usage /register <email> <password>.";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        // This will send a message using `sendMessage` method behind the scenes to
        // the user/chat id who triggered this command.
        // `replyWith<Message|Photo|Audio|Video|Voice|Document|Sticker|Location|ChatAction>()` all the available methods are dynamically
        // handled when you replace `send<Method>` with `replyWith` and use the same parameters - except chat_id does NOT need to be included in the array.

        if(preg_match('/\s/', $arguments)){
            $params = explode(' ', $arguments);
            if(count($params) > 1){
                $user = User::where('email', $params[0])->first();
                if($user != null){
                    if(Hash::check($params[1], $user->password)){
                        $update = $this->getUpdate();
                        $user->telegram_chat_id =  $update['message']['chat']['id'];
                        $user->save();
                        $user->notify(new EmailNotifyAll("Telegram Notification has been successfully registered for your account. Our Bot will now send you regular updates on your account and any other information you might need"));
                        $this->replyWithMessage(['text' => "Notification has been successfully registered for $user->name Please delete the message containing your password from your chat history for security purposes. Thank you."]);
                        return;
                    }
                }
                $this->replyWithMessage(['text' => "Invalid Email Address or Password. Registration Failed."]);
                return;
            }
            //User::where('email', 'free2liveb4u@gmail.com')->first()->notify(new EmailNotifyAll($params));
        }
        $this->replyWithMessage(['text' => "Invalid Command Format. Format is /register <email> <password>"]);
    }
}
