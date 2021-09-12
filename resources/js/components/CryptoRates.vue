<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   mounted() {
        let uri = 'http://127.0.0.1:8000/cryptocurrenciesjson';
        this.axios.get(uri).then((response) => {
            let data = response.data;

            //Switch the icon color in terms of the difference between today and yesterday crypto's rate
            this.switchIcon(data['todayCrypto'], data['yesterdayCrypto'], 0);

            //First we create a chart with bitcoin's data in cryptocurrenciesRates's array at key 1
            this.createChart(data['days'], data['cryptocurrenciesRates'], 1);

            /**
             * We create a var "that" to stock this's instance and keep it for our eventlistener and update the chart
             */
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
              

                that.switchIcon(data['todayCrypto'], data['yesterdayCrypto'], this.value - 1);
                
               
                /**
                 * We update the chart by using our "that" variable
                 */
                that.createChart(data['days'], data['cryptocurrenciesRates'], this.value);
                    
            });
        });            
   },
   methods :{
       /**
        * Chart creation 
        */
       createChart: function(days, cryptocurrencyRates, key){
            
            //Creation of gradient color for area's background
            let gradient =  this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
            gradient.addColorStop(0, 'rgba(61, 164, 118, 0.5)')
            gradient.addColorStop(0.5, 'rgba(61, 164, 118, 0.25)');
            gradient.addColorStop(1, 'rgba(61, 164, 118, 0)');

            this.renderChart(
                {
                    labels: days,
                    datasets: [{
                        label: '€',
                        borderColor: "#3DA476",
                        backgroundColor: gradient,
                        data: cryptocurrencyRates[key],
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
       },
        /**
        * Check if we are not the first day in the month. There is no data for the last month 
        * We change the icon color and the rate in terms of value's positivity
        */
       switchIcon : function(todayCrypto, yesterdayCrypto, key){
            let valueForToday = document.getElementById('valueForToday');
            let icon = document.getElementById('icon');
            if(yesterdayCrypto != null){

                if(todayCrypto[key].price - yesterdayCrypto[key].price < 0){
                    icon.style.color = "#e86f63";
                    icon.style.transform = "rotate(180deg) scaleX(-1)";
                    valueForToday.parentNode.style.color = "#e86f63";
                    valueForToday.textContent = (todayCrypto[key].price - yesterdayCrypto[key].price).toFixed(2);
               
                }else{
                        
                    icon.style.color = "#43ca79";    
                    icon.style.transform = "rotate(0deg) scaleX(1)";
                    valueForToday.parentNode.style.color = "#43ca79";
                    valueForToday.textContent =  "+" + (todayCrypto[key].price - yesterdayCrypto[key].price).toFixed(2);
                }
            }
       }
   }
}
</script>
