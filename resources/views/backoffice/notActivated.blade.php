<x-guest-layout>
   <div class="min-h-screen flex flex-col  sm:items-center items-center sm:pt-0 bg-gray-100">
      <div class="w-full flex justify-end my-2 mx-4">
         <button id="modal-switch"
            class="bg-green-400 hover:bg-green-600 hover:shadow-md text-gray-100 py-1 px-3 text-sm font-semibold rounded-xl shadow-sm">
            Activé maintenant
         </button>
      </div>
      <div name="logo">
         <div class="">
            <img src="{{asset('img/logo.png')}}" class="w-48" alt="">
         </div>

      </div>
      <div class="container w-full mt-2 px-6 py-12 bg-white shadow-md overflow-hidden rounded-lg">
         <div class="w-full">
            <div class="text-5xl w-full text-center uppercase text-red-700 font-extrabold">
               La period du test à été terminé.
            </div>
            <div class="text-lg mt-8 text-gray-800 font-semibold">
               Contacter-nous pour activé l'application sur :
            </div>
            <div class="text-md font-semibold text-gray-800">
               <ul>
                  <li class="my-2"><i class="far fa-phone-alt"></i> 06.66.93.01.03</li>
                  <li class="my-2">07.76.36.95.78</li>
                  <li class="my-2">mkaddourbendahma@gmail.com</li>
               </ul>
            </div>

         </div>

      </div>
   </div>


   <div class="w-full h-full">
      <div id="modal-bg" class="w-full h-full bg-gray-900 opacity-80 top-0 absolute hidden"></div>
      <div id="modal-box"
         class="sm:w-[385px] sm:min-w-[40vw] min-w-[80vw] flex flex-col items-center gap-2 -translate-y-1/2 p-6 bg-[#FFFFEB] rounded-lg top-1/2 left-1/2 -translate-x-1/2 absolute hidden">
         <div class="w-full">
            <form action="{{route('activation.activate')}}" method="POST">
               @csrf
               <div class="flex flex-col w-full justify-start">
                  <label for="" class="text-xs font-bold">Code d'activation</label>
                  <input type="text" name="code_activation"
                     class="rounded-xl px-3 py-2 text-xs font-bold w-full bg-gray-100 mt-2 mb-6">
                  <div class="flex justify-between">
                     <button type="submit" class="bg-green-400 py-1.5 px-4 rounded-xl shadow">Activé</button>
                     <button>Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script>
      const modalbg = document.getElementById('modal-bg');
  const modalSwitch = document.getElementById('modal-switch');
  const modalBox = document.getElementById('modal-box');
  const modalClose = document.getElementById('modal-close');
  modalbg.addEventListener("click", function() {
    modalBox.classList.add('hidden')
    modalbg.classList.add('hidden')
  });
  modalSwitch.addEventListener("click", function() {
    modalBox.classList.remove('hidden')
    modalbg.classList.remove('hidden')
  });
  modalClose.addEventListener("click", function() {
    modalBox.classList.remove('hidden')
    modalbg.classList.remove('hidden')
  });
   </script>

</x-guest-layout>