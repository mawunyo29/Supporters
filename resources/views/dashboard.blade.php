<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12 block">
        @if (session('success'))
            
        <div class="   px-2 mx-auto mb-5 " data-modal id="modal_firstconnection" x-data="{open_modal:false}"  >
            
             <button @click="open_modal =true" id="btn_open" class=" hidden">message</button>
            <div id=show class=" sm:w-1/3 w-full rounded-lg shadow-md sm:ml-8  divide-x-2  overflow-hidden sm:px-2 ring-2 px-2 flex " x-show="open_modal"  x-on:close.stop="modal = false" x-on:keydown.escape.window="modal = false"
            x-transition:enter="transition ease-out duration-500 ease-out origin-left "
            x-transition:enter-start="opacity-0 transform scale-95 -translate-x-full"
            x-transition:enter-end="opacity-100 transform scale-100 "
            x-transition:leave="transition ease-in duration-500 origin-bottom"
            x-transition:leave-start="opacity-100 transform scale-100 "
            x-transition:leave-end="opacity-0 transform scale-95 -translate-x-full" style="display: none" role="alert">

                <div>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __(session('success')) }}
                    </h3>
                    <p class="mt-2 text-gray-600">
                        {{ __('This is your dashboard, where you can manage your account, view your orders, and view
                        your
                        cart.') }}
                        {{ session('success') }}
                    </p>
                </div>
                <div class="flex justify-items-center justify-center relative cursor-pointer " id="close_modal" @click="open_modal=false" >
                    <span class="material-symbols-outlined justify-end py-8">
                        close
                    </span>
                </div>

            </div>
            <div>


            </div>
        </div>
        @endif
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        window.addEventListener('load', function () {
           
            const btn = document.getElementById('btn_open');
            
            if(btn){
                btn.click();
            }

          
          
        });
      
    </script>
        
    @endpush
</x-app-layout>