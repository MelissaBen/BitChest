<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   mounted() {

        let uri = 'http://127.0.0.1:8000/cryptocurrenciesjson';

        let cryptoRateName = document.getElementById('cryptoRateName');    
        let todayCrypto = document.getElementById('todayCrypto');
        let yesterdayCrypto = document.getElementById('yesterdayCrypto');
        let valueForToday = document.getElementById('valueForToday');
        let icon = document.getElementById('icon');

        let gradient =  this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
        gradient.addColorStop(0, 'rgba(61, 164, 118, 0.5)')
        gradient.addColorStop(0.5, 'rgba(61, 164, 118, 0.25)');
        gradient.addColorStop(1, 'rgba(61, 164, 118, 0)');


        this.axios.get(uri).then((response) => {
            let data = response.data;
     
                valueForToday.parentNode.style.display = "inline-block";
                valueForToday.parentNode.style.fontSize = "i28px";
                
                /**
                 * Check if we are not the first day in the month. There is no data for the last month 
                 * We change the icon color and the rate in terms of value's positivity
                 */
                if(yesterdayCrypto != null){
                    if(data['todayCrypto'][0].price - data['yesterdayCrypto'][0].price < 0){
                        icon.style.color = "#e86f63";
                        icon.style.transform = "rotate(180deg) scaleX(-1)";
                        valueForToday.parentNode.style.color = "#e86f63";
                        valueForToday.textContent = (data['todayCrypto'][0].price - data['yesterdayCrypto'][0].price).toFixed(2);
                        
                    }else{
                        icon.style.color = "#43ca79";
                        icon.style.transform = "rotate(0deg) scaleX(1)";
                        valueForToday.parentNode.style.color = "#43ca79";
                        valueForToday.textContent =  "+" + (data['todayCrypto'][0].price - data['yesterdayCrypto'][0].price).toFixed(2) ;
                    }
                }

                /**
                 * First, we create a chart with bitcoin's data
                 */
                this.renderChart(
                    {
                        labels: data['days'],
                        datasets: [{
                            label: '€',
                            borderColor: "#3DA476",
                            backgroundColor: gradient,
                            data: data['cryptocurrenciesRates'][1],
                            lineTension: 0
                            
                        }]
                    },
                    {
                        scaleFontColor: "#FFFFFF",
                        responsive: true, 
                        maintainAspectRatio: false, 
                        legend:false ,  
                        scales: {
                            yAxes: [{
                                display: true,
                                gridLines: {
                                    display: true ,
                                    color: "#31313150"
                                },
                                ticks: {
                                    beginAtZero: true,
                                    min: 800,
                                    max: 1400,
                                    stepSize: 100,
                                    fontColor: '#313131'

                                }
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false ,
                                    color: "#313131"
                                },
                                ticks: {
                                    fontColor: '#313131'
                                }
                            }]
                        }
                    }
                );

            
            //We create a var to stock this's instance and keep it for an evenlistener
            var that = this;

            
            document.getElementById('chartSwitcher').addEventListener('change', function(){  

                //we replace the cryptocurrency's logo
                var cryptoLogo = document.getElementById('cryptoLogo');
                cryptoLogo.setAttribute('src', "/images/" + data['crypto'][this.value].toLowerCase() + ".png");
                
                //We replace the cryptocurrency's name
                cryptoRateName.textContent = this.options[this.selectedIndex].text;

                //We replace yesterday and today's value
                if(yesterdayCrypto != null){
                    yesterdayCrypto.textContent = data['yesterdayCrypto'][this.value - 1].price;
                }
                todayCrypto.textContent = data['todayCrypto'][this.value - 1].price;
              
                /**
                 * Check if we are not the first day in the month. There is no data for the last month 
                 * We change the icon color and the rate in terms of value's positivity
                 */
                if(yesterdayCrypto != null){

                    if(data['todayCrypto'][this.value - 1].price - data['yesterdayCrypto'][this.value - 1].price < 0){
                    icon.style.color = "#e86f63";
                    icon.style.transform = "rotate(180deg) scaleX(-1)";
                    valueForToday.parentNode.style.color = "#e86f63";
                    valueForToday.textContent = (data['todayCrypto'][this.value - 1].price - data['yesterdayCrypto'][this.value - 1].price).toFixed(2);
               
                    }else{
                        
                        icon.style.color = "#43ca79";
                        
                        icon.style.transform = "rotate(0deg) scaleX(1)";
                        valueForToday.parentNode.style.color = "#43ca79";

                        valueForToday.textContent =  "+" + (data['todayCrypto'][this.value - 1].price - data['yesterdayCrypto'][this.value - 1].price).toFixed(2);
                
                    }
                }
               
                /**
                 * We update the chart by using our that variable
                 */
                that.renderChart(
                    {
                        labels: data['days'],
                        datasets: [{
                            label: '€',
                            borderColor: '#41B883',
                            backgroundColor: gradient,
                            data: data['cryptocurrenciesRates'][this.value],
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
              	                stepSize: 100 
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
