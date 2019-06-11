@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="margin-top: 10px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">用户</li>
                    <li class="list-group-item">
                        <div>今日注册：20</div>
                        <div>今日注册：20</div>
                        <div>今日注册：20</div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card" style="margin-top: 10px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">话题</li>
                    <li class="list-group-item">
                        <div>今日发表：20</div>
                        <div>今日发表：20</div>
                        <div>今日发表：20</div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="margin-top: 10px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">回复</li>
                    <li class="list-group-item">
                        <div>今日回复：20</div>
                        <div>今日回复：20</div>
                        <div>今日回复：20</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card" style="margin-top: 10px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div id="chart" style="height:500px;width: 100%"></div>
            </li>
        </ul>
    </div>
@endsection
@section("script")
    <script>
        $(function(){
          var myChart = echarts.init(document.getElementById('chart'));
          var option = {
            title : {
              text: '活跃统计',
              subtext: '最近15日活跃情况'
            },
            tooltip : {
              trigger: 'axis'
            },
            legend: {
              data:['话题新增数','评论新增数', '点赞新增数']
            },
            toolbox: {
              show : true,
              feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
              }
            },
            calculable : true,
            xAxis : [
              {
                type : 'category',
                boundaryGap : false,
                data : ['2019/5/30','周二','周三','周四','周五','周六','周日']
              }
            ],
            yAxis : [
              {
                type : 'value',
                axisLabel : {
                  formatter: '{value}'
                }
              }
            ],
            series : [
              {
                name:'话题新增数',
                type:'line',
                data:[11, 11, 15, 13, 12, 13, 10],
                markPoint : {
                  data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                  ]
                },
                markLine : {
                  data : [
                    {type : 'average', name: '平均值'}
                  ]
                }
              },
              {
                name:'评论新增数',
                type:'line',
                data:[1, 2, 5, 3, 2, 0],
                markPoint : {
                  data : [
                    {name : '周最低', value : -2, xAxis: 1, yAxis: -1.5}
                  ]
                },
                markLine : {
                  data : [
                    {type : 'average', name : '平均值'}
                  ]
                }
              },
              {
                name:'点赞新增数',
                type:'line',
                data:[1, 2, 5, 3, 2, 0],
                markPoint : {
                  data : [
                    {name : '周最低', value : -2, xAxis: 1, yAxis: -1.5}
                  ]
                },
                markLine : {
                  data : [
                    {type : 'average', name : '平均值'}
                  ]
                }
              }
            ]
          };
          myChart.setOption(option);
        });
    </script>
@endsection