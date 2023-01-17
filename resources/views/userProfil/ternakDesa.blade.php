@include('user.head')
@include('user.navbar')

{{-- SECTION TITTLE PROFIL --}}
<section id="hero-profil">
    <section id="hero-gradient" class="section d-flex justify-content-center align-items-center mb-5">
      <div class="container">
        <div class="row">
          <div class="tittle col text-white">
            <p>Girimulyo > Statistik > Ternak</p>
            <h1 class="fw-bold">Statistik Ternak Penduduk Desa Girimulyo</h1>
          </div>
        </div>
      </div>
    </section>
</section>  
{{-- AKHIR SECTION TITTLE PROFIL --}}

{{-- SECTION AWAL TENTANG DESA --}}

<section class="section-jobs">
  <div class="container mt-5">
    <div class="list-container row d-flex flex-lg-row flex-column flex-lg-nowrap">
      
      <div class="col-lg-7 col-12 d-flex flex-column">
        <a href="/#data" class="btn btn-warning text-decoration-none mb-5"><span data-feather="arrow-left"></span>Back to statistik</a>
        <div class="container-custom gap-3 px-md-0 p-lg-0 m-auto px-3">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <div class="button-container d-flex gap-3 my-3 justify-content-center mb-4">
            <button type="button" onclick="updateChartType('bar')" class="btn btn-success">Bar Chart</button>
            <button type="button" onclick="updateChartType('doughnut')" class="btn btn-warning">Pie Chart</button>
        </div>
        <table class="table table-striped table-hover mb-5">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Ternak</th>
                <th scope="col">Jantan</th>
                <th scope="col">Betina</th>
                <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataternak as $pek )
                <tr class="ternak">
                    <td> {{ $loop -> iteration }} </td>
                    <td> {{ $pek -> jenis_ternak }} </td>
                    <td> {{ $pek -> jantan }} </td>
                    <td> {{ $pek -> betina }} </td>
                    <td> {{ $pek -> total }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>

      <div class="news col-lg-5 col-12 section-news d-flex flex-column align-items-center">
        @include('user.news')
      </div>

    </div>
  </div>
</section>

{{-- AKHIR SECTION TENTANG DESA --}}

@include('user/footer')
@include('user/foot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js" integrity="sha512-d6nObkPJgV791iTGuBoVC9Aa2iecqzJRE0Jiqvk85BhLHAPhWqkuBiQb1xz2jvuHNqHLYoN3ymPfpiB1o+Zgpw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script> 
    const ternakTable = document.querySelectorAll('.ternak')
    const jenis = [];
    const jantan = [];
    const betina = [];
    const jumlah = [];

    ternakTable.forEach(dataTernak => {
        const iterasi = dataTernak.children.length;
        for(let i=0; i<iterasi; i++){
            if(i == 1) jenis.push(dataTernak.children[i].innerHTML)
            else if(i == 2) jantan.push(dataTernak.children[i].innerHTML)
            else if(i == 3) betina.push(dataTernak.children[i].innerHTML)
            else if(i == 4) jumlah.push(dataTernak.children[i].innerHTML)
        }
    });

    const chartBox = document.getElementById('myChart').getContext('2d');
    const dataBar = {
        labels: jenis,
        datasets: [{
            label: 'Jantan',
            data: jantan,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1,
        }, {
            label: 'Betina',
            data: betina,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1,
        }]
    }

    const dataPie = {
        labels: jenis,
        datasets: [{
            data: jumlah,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(209, 81, 45, 0.2)',
                'rgba(255, 159, 64, 0.3)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(196, 223, 170, 0.3)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(49, 8, 123, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(250, 47, 181, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(209, 81, 45, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(196, 223, 170, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(49, 8, 123, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(250, 47, 181, 1)',
            ],
        }]
    }

    const configBar = {
        type: 'bar',
        data: dataBar,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    font: {
                        size: 20,
                    },
                    padding: {
                        bottom: 30
                    },
                    text: 'Bagan Sebaran Ternak Desa Girimulyo'
                }
            }
        },
    }

    const configPie = {
        type: 'doughnut',
        data: dataPie,
        options: {
            plugins: {
                title: {
                    display: true,
                    font: {
                        size: 20,
                    },
                    padding: {
                        bottom: 30
                    },
                    text: 'Bagan Sebaran Ternak Desa Girimulyo'
                }
            },
            borderWidth: 1,
            cutout: '70%',
            borderRadius: 25,
            spacing: 8,
            responsive: true,
        },
    }

    // Inisialisasi / render chart
    let myChart = new Chart(chartBox, configBar);

    function updateChartType(updatedType){
        myChart.destroy();
        if(updatedType == 'bar'){
            myChart = new Chart(chartBox, configBar)
        }
        else if(updatedType == 'doughnut'){
            myChart = new Chart(chartBox, configPie)
        }
    }

</script>

