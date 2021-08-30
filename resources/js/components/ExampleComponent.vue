<script>
import { Line } from 'vue-chartjs';
export default {
   extends: Line,
   mounted() {
        let uri = 'http://127.0.0.1:8000/jsontest';

        let cryptoRate = document.getElementById('cryptoRate');    
        let todayCrypto = document.getElementById('todayCrypto');
        let yesterdayCrypto = document.getElementById('yesterdayCrypto');
        let valueForToday = document.getElementById('valueForToday');
        let icon = document.getElementById('icon');
        let gradient =  this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
        
        gradient.addColorStop(0, 'rgba(65, 184, 131, 0.5)')
        gradient.addColorStop(0.5, 'rgba(65, 184, 131, 0.25)');
        gradient.addColorStop(1, 'rgba(65, 184, 131, 0)');
        this.axios.get(uri).then((response) => {
            let data = response.data;
     
                    valueForToday.parentNode.style.display = "inline-block"
                if(data['todayCrypto'][0].price - data['yesterdayCrypto'][0].price < 0){
                   
                    icon.style.color = "#e86f63";
                    icon.style.transform = "rotate(180deg) scaleX(-1)";
                    valueForToday.parentNode.style.color = "#e86f63";
                    valueForToday.textContent = data['todayCrypto'][0].price - data['yesterdayCrypto'][0].price;
               
                }else{
                    
                    icon.style.color = "#43ca79";
                    
                    icon.style.transform = "rotate(0deg) scaleX(1)";
                    valueForToday.parentNode.style.color = "#43ca79";

                    valueForToday.textContent =  "+" + (data['todayCrypto'][0].price - data['yesterdayCrypto'][0].price) ;
               
                }
            this.renderChart(
                {
                    labels: data['days'],
                    datasets: [{
                        label: '€',
                        borderColor: "#41B883",
                        backgroundColor: gradient,
                        data: data['mydata'][1],
                        lineTension: 0
                        
                    }]
                },
                {
                    
                    responsive: true, 
                    maintainAspectRatio: false, 
                    legend:false ,  
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true ,
                                color: "#FFFFFF50"
                            },
                            ticks: {
                                beginAtZero: true,
              	                min: 800,
              	                max: 1400,
              	                stepSize: 100 // 1 - 2 - 3 ...
                            }
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false ,
                                color: "#FFFFFF"
                            }
                        }]
                    }
                }
            );
            var that = this;

            document.getElementById('chartSwitcher').addEventListener('change', function(){  

        var cryptoIcon = document.getElementById('cryptoIcon');
                cryptoRate.textContent = this.options[this.selectedIndex].text;
                yesterdayCrypto.textContent = data['yesterdayCrypto'][this.value - 1].price;
                todayCrypto.textContent = data['todayCrypto'][this.value - 1].price;
                cryptoIcon.setAttribute('src', "/images/" + data['crypto'][this.value].toLowerCase() + ".png");
                console.log(cryptoIcon)
                if(data['todayCrypto'][this.value - 1].price - data['yesterdayCrypto'][this.value - 1].price < 0){
                   
                    icon.style.color = "#e86f63";
                    icon.style.transform = "rotate(180deg) scaleX(-1)";
                    valueForToday.parentNode.style.color = "#e86f63";
                    valueForToday.textContent = data['todayCrypto'][this.value - 1].price - data['yesterdayCrypto'][this.value - 1].price;
               
                }else{
                    
                    icon.style.color = "#43ca79";
                    
                    icon.style.transform = "rotate(0deg) scaleX(1)";
                    valueForToday.parentNode.style.color = "#43ca79";

                    valueForToday.textContent =  "+" + (data['todayCrypto'][this.value - 1].price - data['yesterdayCrypto'][this.value - 1].price) ;
               
                }

                that.renderChart(
                    {
                        labels: data['days'],
                        datasets: [{
                            label: '€',
                            borderColor: '#41B883',
                            backgroundColor: gradient,
                            data: data['mydata'][this.value],
                            lineTension: 0
                        }]
                    }
                    ,
                    {
                        responsive: true, 
                        maintainAspectRatio: false, 
                        legend:false,
                        scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
              	                min: 800,
              	                max: 1400,
              	                stepSize: 100 // 1 - 2 - 3 ...
                            }
                        }]
                    }
                    }
                );
                    
            });
        });            
   }
}
</script>
