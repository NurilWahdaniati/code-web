 <main>
     <div class="container">
         <div class="w-100 h-100">
             <canvas id="grafikAir"></canvas>
         </div>
         @php
             $tinggi = array_values($tinggis);
         @endphp
         @php
             $tanggal = $tanggals->map(function ($model) {
                 return $model->created_at->format('Y-m-d H:i:s');
             });
         @endphp
         <script>
             var ctx = document.getElementById("grafikAir").getContext('2d');
             var grafikAir = new Chart(ctx, {
                 type: 'line',
                 data: {
                     labels: {!! json_encode($tanggal) !!},
                     datasets: [{
                         label: 'Data Tinggi Air',
                         data: {!! json_encode($tinggi) !!},
                     }]
                 }
             });
         </script>
     </div>
 </main>
