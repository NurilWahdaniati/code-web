 <main>
     <div class="container">
         <div class="w-100 h-100">
             <canvas id="grafikAir"></canvas>
         </div>
         @php
             $tinggi = array_values($tinggis);
             $tanggal = $tanggals->map(function ($model) {
                 return $model->created_at->format('Y-m-d H:i:s');
             });
         @endphp
         <script>
             var link = "{{asset('image/')}}";
             var images = {!! json_encode($images) !!}
             var ctx = document.getElementById("grafikAir").getContext('2d');
             let grafikAir = new Chart(ctx, {
                 type: 'line',
                 data: {
                     labels: {!! json_encode($tanggal) !!},
                     datasets: [{
                         label: 'Data Tinggi Air',
                         data: {!! json_encode($tinggi) !!},
                     }]
                 },

             });
             ctx2 = document.getElementById("grafikAir")
             ctx2.onclick = function(evt) {
                 var activePoints = grafikAir.getElementsAtEvent(evt);
                 if (activePoints[0]) {
                     var chartData = activePoints[0]['_chart'].config.data;
                     var idx = activePoints[0]['_index'];

                     var label = chartData.labels[idx];
                     var value = chartData.datasets[0].data[idx];

                     show(link+'/'+images[label]);
                 }
             }
         </script>
         <!-- Image -->
         <div class="modal fade  border-0" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
             <div class="modal-dialog modal-xl bg-transparent border-0">
                 <div class="modal-content bg-transparent border-0">
                     <div class="modal-header bg-transparent border-0">
                         <h4 class="modal-title text-white" id="myModalLabel">Gambar</h4>
                         <button type="button" class="close bg-transparent border-0 h3 text-white"
                             data-bs-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                 class="sr-only">Close</span></button>
                     </div>
                     <div class="modal-body text-center bg-transparent border-0">
                         <img src="" id="imagepreview" class="rounded-3" style="width: 100%;">
                     </div>
                 </div>
             </div>
         </div>
         <script>
             function show(image) {
                 $('#imagepreview').attr('src',image);
                 $('#imagemodal').modal('show');
             }
         </script>
     </div>
 </main>
