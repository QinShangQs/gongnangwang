 //饼图
	var myChart = echarts.init(document.getElementById('main'));
	option = {
		title: {
	        text: '成绩分布'
	    },
	    tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: {c} ({d}%)"
	    },
	    color:['#7ccfbb','#f2c17f','#84e6f1','#dddddd'], 
	    legend: {
	        orient: 'vertical',
	        x: 'right',
	        data:['60分以下','60-80分','80-90分','90-100分']
	    },
	    series: [
	        {
	            name:'访问来源',
	            type:'pie',
	            radius: ['50%', '70%'],
	            avoidLabelOverlap: false,
	            label: {
	                normal: {
	                    show: false,
	                    position: 'center'
	                },
	                emphasis: {
	                    show: true,
	                    textStyle: {
	                        fontSize: '30',
	                        fontWeight: 'bold'
	                    }
	                }
	                
	            },
	            labelLine: {
	                normal: {
	                    show: false
	                }
	            },
	            data:[
	                {value:100, name:'60分以下'},
	                {value:100, name:'60-80分'},
	                {value:100, name:'80-90分'},
	                {value:100, name:'90-100分'},
	            ]
	        }
	    ]
	};
myChart.setOption(option);