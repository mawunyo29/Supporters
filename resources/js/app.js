import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




const getEvents = async () => {

  await axios.get("/auth/user").then(res => {
    window.user = res.data.user;
    window.friend = res.data.friends;
    const messagechannel = res.data.friends.map(friend => {

      return Echo.join('presence.message.' + friend.id);
    });

    console.log(friend);

    console.log(window.user);
    const invitationchannel = Echo.private('private.sendinvitation.' + window.user.id);

    const inputMessage = document.getElementById('inputMessage');
    const typingMessage = document.getElementById('typingMessage');

    inputMessage.addEventListener('input', function (e) {

      messagechannel.forEach(channel => {


        if (inputMessage.value.length === 0) {

          channel.whisper('stop-typing');

        } else {

          channel.whisper('typing', {

            user: window.user.name,
          });
        }
      });
    });


    invitationchannel.subscribed(() => {
      console.log('subscribed');
    }
    ).listen('.send.invitation', (e) => {
      console.log(e.message);
      window.Livewire.emit('notifyNewMessage', e.message);
      window.Livewire.emit('sendNotification');
      window.Livewire.emit('sendNotification:' + e.id);
      console.log('invitation sent');
    });

    messagechannel.forEach(channel => {
      channel.here((users) => {
        console.log({ users });
        window.Livewire.emit('userJoinOrLeave', users);

      }
      ).joining((user) => {
        console.log({ 'user  joinning': user });
       
      }
      ).leaving((user) => {
        console.log({ 'user leaving': user });
      

      }
      ).listen('.send.message', (e) => {

        window.Livewire.emit('typingMessage', e.message, e.user, friend);
      
        const chatboxs = document.getElementById('chatbox');
        // const scrollHeightb = chatboxs.scrollHeight - Math.round(chatboxs.scrollTop) === chatboxs.clientHeight;
        // const scrollBottom = chatboxs.scrollHeight - chatboxs.scrollTop - chatboxs.clientHeight

        // if (!scrollBottom) {
        //   chatboxs.scrollTop = chatboxs.scrollHeight;
        const taill = document.getElementsByClassName("message");
      
      
        // }
       chatboxs.scrollTop = chatboxs.scrollHeight ;
        // const taills =  document.querySelectorAll('.message');
        // taills.forEach(tail => {
        //   tail.scrollIntoView({ behavior: 'smooth' });
         
        // }
        // );
     
       

       
        // window.getComputedStyle(chatboxs).overflowY === 'visible'
        // window.getComputedStyle(chatboxs).overflowY !== 'hidden'
         console.log(getComputedStyle(chatboxs).height);



        // console.log(chatboxs.scrollHeight);

      }
      ).listenForWhisper('typing', (e) => {

        typingMessage.textContent = e.user + ' is typing';
        typingMessage.classList.remove('hidden');
        const donotdiv = document.createElement('div');
        donotdiv.classList.add('typing', 'mx-2');
        for (let i = 0; i < 3; i++) {
          const donot = document.createElement('span');
          donot.classList.add('dot');
          typingMessage.appendChild(donotdiv).appendChild(donot);
        }


      }).listenForWhisper('stop-typing', (e) => {

        typingMessage.classList.add('hidden');

        typingMessage.textContent = '';
      }
      );
    });


  }).catch(err => {

    console.log(err);
  }
  );

}
getEvents();



// window.addEventListener('DOMContentLoaded', function () {
//   window.Echo.private('private.send.invitation'+window.App.user)
//        .listen('SendNotificationEvent', (e) => {
//            window.Livewire.emit('sendNotification');
//           window.Livewire.emit('sendNotification:'+ e.id);
//           console.log(e.id);
//        });

//        window.Echo.private('channel-message'+window.App.user )
//        .listen('SendMessageEvent', (e) => {
//            window.Livewire.emit('sendNotification');
//           window.Livewire.emit('sendNotification:'+ e.id);
//           console.log(e.message);
//        })
//        window.Echo.channel(`App.User.${window.App.user}`)
// .notification((notification) => {
// console.log(notification.type);
// });

// });
// Language: javascript



// On page load or when changing themes, best to add inline in `head` to avoid FOUC


// Whenever the user explicitly chooses light mode
//   localStorage.theme = 'light'

// Whenever the user explicitly chooses dark mode
//   localStorage.theme = 'dark'

// Whenever the user explicitly chooses to respect the OS preference
//localStorage.removeItem('theme')
//slider
window.onload = function () {
  var light = document.getElementById('light');
  var dark = document.getElementById('dark-mode-switch');

  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
    console.log('dark theme');
    light.style.display = 'block';
    dark.style.display = 'none';
  } else {
    document.documentElement.classList.remove('dark')
    light.style.display = 'none';
    dark.style.display = 'block';

  }

  // On theme change, update localStorage


  document.addEventListener('click', function (e) {
    if (e.target.id === 'dark-mode-switch') {
      localStorage.setItem('theme', 'dark');
      document.documentElement.classList.add('dark')
      light.style.display = 'block';
      dark.style.display = 'none';

    } else if (e.target.id === 'light') {
      localStorage.setItem('theme', 'light');
      document.documentElement.classList.remove('dark')
      dark.style.display = 'block';
      light.style.display = 'none';
      console.log('light je suis la');
    }
  });

  //slibar navigation  
  var retract = false;
  var slidebar;

  document.addEventListener('click', function (e) {
    if (e.target.id == "reduce_btn") {
      retract = document.getElementById("reduce_btn");
      slidebar = document.getElementById("sidebar");

      if (retract.hasAttribute("retract")) {

        slidebar.style.width = "14rem";
        retract.removeAttribute("retract");
        document.getElementById("logo_dash_l").style.display = "block";

        retract.style.transform = "rotate(180deg)";
        retract.style.transition = "transform 0.5s";
        retract.style.transitionTimingFunction = "ease-in-out";
        document.querySelectorAll(".left_slider_content").forEach(function (element) {
          element.style.display = "block";
        });

        console.log(e.target.id);

      } else {
        slidebar.classList.remove("w-56");
        slidebar.style.width = "4rem";
        slidebar.classList.add("transition-all", 'duration-500');
        retract.style.transform = "rotate(180deg)" ? "rotate(0deg)" : "rotate(-180deg)";

        retract.setAttribute("retract", "sidebar_retracted");
        document.getElementById("logo_dash_l").style.display = "none";
        document.querySelectorAll(".left_slider_content").forEach(function (element) {
          element.style.display = "none";
        });

      }

      slidebar.classList.add("transition-all", 'duration-500');
      retract.style.transition = "transform 0.5s";

    }
  });


}
