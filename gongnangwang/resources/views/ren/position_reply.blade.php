    @foreach ($data['res'] as $user)

    <div class="Left_One">
        <a href="/ren_m/{{$user->par_proname}}/{{ $user->id }}">
            <div class="Left_One_bor Left"></div>
            <div class="Left_One_wor Left">
                <div class="beij">
                    <h3 class="Left">{{ $user->par_position }}</h3>
                    <span>({{ explode(',',$user->par_address)[1] }})</span>
                    <p class="search_text Right">浏览量（{{ $user->par_browse }}）</p>
                </div>
                <div>{{ $user->par_title }}</div>
                <div>
                    <p class="Left">@if($user->par_mode==1)全职@else兼职@endif / @if($user->par_protype==1)公司@else个人@endif  （{{ $user->par_proname }}）</p>
                    <p class="Right">{{ substr($user->par_datetime,0 , strpos($user->par_datetime, ' ')) }}</p>
                </div>
            </div>
        </a>
    </div>

    @endforeach


            <!--分页-->
    <div class="fenye">
        <ul class="fenye_ul Left">
            <li class="page">1</li>
            <li class="page">2</li>
            <li class="page">3</li>
            <li class="page">4</li>
            <li class="page">5</li>
            <li class="fenye_ul_next">下一页</li>
        </ul>
        <p>共{{ $data['page_count'] }}页</p>
        <p>去第<input type="text" />页</p>
        <p class="que">确定</p>
    </div>


    <script type="text/javascript">
        $('.page').click(function () {
            var page = $(this).html();
            $.get("/position_page", { page: page },
                    function(data){
                        $('#reply_content').html(data);
                    });

        })
    </script>