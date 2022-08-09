<div class="flex items-stretch flex-shrink-0" >
    @foreach ($relationships as $friend)
    <button class="m-1 caroussel" id="{{md5($friend->id)}}"   wire:click="$emit('friendId',{{$friend->id}})">
        <div class="flex ">
            {{-- <img class="w-10 h-10 rounded-full" src="{{$friend->avatar}}" alt=""> --}}
            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg"
                alt="avatar image" wire:offline.class.remove="{{$user->trackActivity($friend->id) ??'ring-green-300'}}"
                class="inline-flex items-center justify-center w-12 h-12 text-white transition-all duration-200 ease-in-out rounded-full cursor-pointer ring-2 {{$user->trackActivity($friend->id) ?'ring-green-300':'ring-red-500'}} text-size-sm rounded-circle" />
        </div>
        <p class="static text-xs text-center"> {{explode(" ",$friend->name)[0]}} </p>  
    </button>
    @endforeach
  

    {{-- @push('scripts')
    <script>
        function caroussel(){
  return {
   currentSlide:0,
        init(){
           
            const friends = document.querySelectorAll('.caroussel');
        const nextSlide = () => {
            friends[this.currentSlide].classList.remove('visible');
            this.currentSlide = (this.currentSlide + 1) % friends.length;
            friends[this.currentSlide].classList.add('visible');
        };
        const prevSlide = () => {
            friends[this.currentSlide].classList.remove('visible');
            this.currentSlide = (this.currentSlide - 1) % friends.length;
            friends[this.currentSlide].classList.add('visible');
        };
        let slideInterval = setInterval(nextSlide, 5000);
        const pauseSlideshow = () => {
            clearInterval(slideInterval);
        };
        const playSlideshow = () => {
            slideInterval = setInterval(nextSlide, 5000);
        };
       
        friends.forEach(friend => {
            friend.addEventListener('click', () => {
                pauseSlideshow();
                nextSlide();
                playSlideshow();
            });
        });

        }
  
    }
    }
    
     window.addEventListener('load', () => {
        caroussel().init();
    });
      
   
    </script>
    @endpush --}}
   
    
</div>

