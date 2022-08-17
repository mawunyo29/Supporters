<?php

namespace App\Http\Livewire\Back;

use App\Events\SendMessageEvent;
use App\Models\User;
use Livewire\Component;
use Spatie\Emoji\Emoji;
use Spatie\Emoji\Generator\Emoji as GeneratorEmoji;

use function PHPSTORM_META\map;

class ChatMessage extends Component
{
    public $message = '';
    public $user;
    public $notifications;
    public $showNewUserNotification = false;
    public $is_open_send_invitation = true;
    public $chat_modal = false;
    public $right_side_modal = false;
    public $user_to_add;
    public $taping = '';
    public $messages = [];
    public $current_user_join_or_leave = [];
    public $current_friend;
    public $users = [];


    public function mount($user)
    {
        $this->user = $user;
    }
    //     protected $listeners = ["sendNotification" => 'notifyNewUser',
    //     'typingMessage','getFriendById'
    // ];
    protected function getListeners()
    {
        return [
            "sendNotification" => 'notifyNewUser',
            'typingMessage', 'friendId' => 'selectFriendById',
            'userJoinOrLeave' => 'joinOrLeaveChat',
        ];
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required',
        ]);
        event(new SendMessageEvent($this->message, $this->user, $this->current_friend));

        $this->message = '';
    }

    public function notifyNewUser()
    {

        $this->showNewUserNotification = true;

        $this->dispatchBrowserEvent('typingMessage', $this->message);
    }
    // public function updatedMessage($proprety)
    // {
    //     $this->message = $proprety;
    //     event(new SendMessageEvent($this->message ,$this->user));
    // }
    public function typingMessage($typing, $user, $friend)
    {
        $this->dispatchBrowserEvent('typingMessage', ['typing' => $typing, 'user' => $user, 'friend' => $friend]);
        $this->users = $user;
        $this->taping = $typing;
        if ($user) {
            $this->messages[] = ['user' => $user, 'message' => $typing];
            $this->current_friend = $user;
        }
    }


    public function chatMessage($message)
    {
        $this->message = $message;

        event(new SendMessageEvent($this->message, $this->user, $this->current_friend));
    }

    public function selectFriendById($id)
    {
        $this->current_friend = $id;


        User::find($id);
    }
    /**
     * join or leave chat
     */
    public function joinOrLeaveChat($users)
    {
        $lljoin_users = collect($users);
        foreach ($lljoin_users as $key => $value) {
            # code...
            $this->current_user_join_or_leave[] = $lljoin_users[$key]['name'];
        }
        $this->current_user_join_or_leave =  collect($this->current_user_join_or_leave)->unique();
        # code...

    }

    public function chatModal()
    {
        $this->chat_modal =  !$this->chat_modal;
    }

    // public function  notifyNewMessage($message)
    // {
    //     $this->message = $message;
    //     event(new SendMessageEvent($this->message ,$this->user));
    // }
    public  $UNI_CODE = [
        'facce_smiling' => [
            'grinning' => '😀',
            'smiling' => '😊',
            'smiling_eyes' => '😉',
            'sad' => '😔',
            'thinking' => '🤔',
            'grin' => '😁',
            'joy' => '😂',
            'rofl' => '🤣',
            'smiley' => '😃',
            'smile' => '😄',
            'sweat_smile' => '😅',
            'laughing' => '😆',
            'wink' => '😉',
            'blush' => '😊',
            'innocent' => '😇',
            'slightly_smiling_face' => '🙂',
            'upside_down_face' => '🙃',


        ],
        'face_affection' => [
            'face_with_hearts' => '🥰',
            'kissing_heart' => '😘',
            'face_with_heart_eyes' => '😍',

        ],
        'face_glasses' => [
            'sunglasses' => '😎',
            'nerd_face' =>'🤓',

        ],
        'upside_down_face'=>[
            'down1'=>'🙃',
            'down2'=>'🙃',
            'down3'=>'🙃',
        ],


    ];
    public function render()
    {
        $face = Emoji::CHARACTER_SMILING_FACE_WITH_SUNGLASSES;

        $emotionall = Emoji::all();


        $emotions = collect($emotionall)->map(function ($item, $key) {
            return $key;
        });
        return view('livewire.back.chat-message', compact('face', 'emotions'));
    }
}
