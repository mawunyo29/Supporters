<?php

namespace App\Http\Livewire\Back;

use andkab\LaravelJoyPixels\LaravelJoyPixels;
use App\Events\SendMessageEvent;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;


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
    public  Collection $emojis;



    public function mount($user)
    {
        $this->user = $user;
        $this->emojis=collect([]);
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
            'grinning_face_with_big_eyes' => '😃',
            'face_with_smiling_eyes' => "\u{1F604}",
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
            'nerd_face' => '🤓',

        ],
        'upside_down_face' => [
            'down1' => '🙃',
            'down2' => '🙃',
            'down3' => '🙃',
        ],
        'SUBDIVISION_FLAG' => [
            'flag1' => '🏁',
            'flag2' => '🚩',
            'flag3' => '🎌',
            'flag4' => '🏴',
            'flag5' => '🏳️',
            'flag6' => '🏳️‍🌈',
            'flag7' => '🏴‍☠️',
            'CHARACTER_FLAGS_FOR_FLAG_ENGLAND' => "\u{1F3F4}\u{E0067}\u{E0062}\u{E0065}\u{E006E}\u{E0067}\u{E007F}",
            'CHARACTER_FLAGS_FOR_FLAG_SCOTLAND' => "\u{1F3F4}\u{E0067}\u{E0062}\u{E0073}\u{E0063}\u{E0074}\u{E007F}",
            'CHARACTER_FLAGS_FOR_FLAG_WALES' => "\u{1F3F4}\u{E0067}\u{E0062}\u{E0077}\u{E006C}\u{E0073}\u{E007F}"
        ],
        'COUNTRY_FLAG' => [
            ' FLAG_ASCENSION_ISLAND' => "\u{1F1E6}\u{1F1E8}",

        ],


    ];

    public  $CATEGORY_ICONS = [
        'activity' => '🏃',
        'animals_and_nature' => '🐶',
        'diversity' => '👨‍👩‍👧‍👦',
        'flags' => '🏁',
        'food_and_drink' => '🍔',
        'objects' => '📱',
        'people' => '👨',
        'symbols' => '💯',
        'travel_and_places' => '🚗',

    ];

    public function geEmoji()
    {
        $emojis = LaravelJoyPixels::getClient()->getRuleset()->getShortcodeReplace();
    
        foreach ($emojis as $key => $emoji) {
            $this->emojis->push( [$key=>$emoji]) ;
            $data[] = LaravelJoyPixels::getClient()->shortnameToImage($key);
        }

        return $data;
    }
    public function render()
    {


        $data = $this->geEmoji();
        $face = '😎';
        return view('livewire.back.chat-message', compact('face', 'data'));
    }
}
