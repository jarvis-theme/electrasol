<footer id="footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-widget">
                        <h2>Tentang Kami</h2>
                        <p>{{short_description($aboutUs[1]->isi,400)}}</p>
                    </div>
                </div>
                @foreach(other_menu() as $key=>$menu)
                    @if($key == '0' || $key == '1')
                    <div class="col-md-2">
                        <div class="single-widget">
                            <h2>{{$menu->nama}}</h2>
                            <ul class="nav nav-pills nav-stacked">
                            @foreach($menu->link as $link_menu)
                                @if($menu->id == $link_menu->tautanId)
                                <li><a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a></li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                @endforeach
                
                <div class="col-md-2">
                    <div class="single-widget">
                        <h2>Social Media</h2>
                        <ul class="nav nav-pills nav-stacked">
                            @if(!empty($kontak->fb))
                            <li><a href="{{url($kontak->fb)}}"><span class="fa-stack fa-lg" style="color:#0083C9;"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>&nbsp;Facebook</a></li>
                            @endif
                            @if(!empty($kontak->tw))
                            <li><a href="{{url($kontak->tw)}}"><span class="fa-stack fa-lg" id="tw"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>&nbsp;Twitter</a></li>
                            @endif
                            @if(!empty($kontak->gp))
                            <li><a href="{{url($kontak->gp)}}"><span class="fa-stack fa-lg" id="gp"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x fa-inverse"></i></span>&nbsp;Google+</a></li>
                            @endif
                            @if(!empty($kontak->pt))
                            <li><a href="{{url($kontak->pt)}}"><span class="fa-stack fa-lg" id="pt"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span>&nbsp;Pinterest</a></li>
                            @endif
                            @if(!empty($kontak->tl))
                            <li><a href="{{url($kontak->tl)}}"><span class="fa-stack fa-lg" id="tl"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-tumblr fa-stack-1x fa-inverse"></i></span>&nbsp;Tumblr</a></li>
                            @endif
                            @if(!empty($kontak->ig))
                            <li><a href="{{url($kontak->ig)}}"><span class="fa-stack fa-lg" id="ig"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></span>&nbsp;Instagram</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="footer-bottom" align="center">
        <div class="container">
            <div class="row">
               <p>Copyright &copy; {{date('Y')}} {{ short_description(Theme::place('title'),150) }}. All Right Reserved. Powered by <a style="text-decoration: none;color: #fff;" target="_blank" href="http://jarvis-store.com">Jarvis Store</a></p>
            </div>
        </div>
    </div>
    
</footer>