/**
 * Created by Administrator on 2016/11/18.
 */
//饼图
var myChart = echarts.init(document.getElementById('main'));
option = {
    title: {
        text: '融资'
    },
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    color:['#2d405c','#fd3881'],
    legend: {
        orient: 'vertical',
        x: 'right',
        data:['未融资','融资']
    },
    series: [
        {
            name:'访问来源',
            type:'pie',
            radius: ['33%', '67%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '20',
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
                {value:33, name:'未融资'},
                {value:67, name:'融资'},
            ]
        }
    ]
};
myChart.setOption(option);
function tab(x,y,z){
    var oLi= x.getElementsByTagName('li');
    var ODiv=document.getElementsByClassName(y);
    var i=0;
    for(var i=0;i<oLi.length;i++){
        oLi[i].a=i;
        oLi[i].onclick=function(){
            for(var j=0;j<oLi.length;j++){
                oLi[j].className="";
                ODiv[j].style.display='none';
            }
            ODiv[this.a].style.display='block';
            this.className=z;
        }
    }
}
tab(ul03,'tab_list','ul03_active')