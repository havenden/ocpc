@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">转化概览</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>今日</th>
                        <th>昨日</th>
                        <th>本周</th>
                        <th>上周</th>
                        <th>本月</th>
                        <th>上月</th>
                        <th>所有</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>{{ isset($convsCount['today'])?$convsCount['today']:0 }}</td>
                        <td>{{ isset($convsCount['yesterday'])?$convsCount['yesterday']:0 }}</td>
                        <td>{{ isset($convsCount['thisweek'])?$convsCount['thisweek']:0 }}</td>
                        <td>{{ isset($convsCount['lastweek'])?$convsCount['lastweek']:0 }}</td>
                        <td>{{ isset($convsCount['thismonth'])?$convsCount['thismonth']:0 }}</td>
                        <td>{{ isset($convsCount['lastmonth'])?$convsCount['lastmonth']:0 }}</td>
                        <td>{{ isset($convsCount['all'])?$convsCount['all']:0 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix"></div>
</div>
@endsection
