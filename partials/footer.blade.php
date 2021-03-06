<footer id="footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-widget">
                        <h2>Tentang Kami</h2>
                        <p>{{short_description(about_us(1)->isi,400)}}</p>
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
                        <h2>Ikuti Kami</h2>
                        <ul class="nav nav-pills nav-stacked">
                            @if(!empty($kontak->fb))
                            <li><a href="{{url($kontak->fb)}}" target="_blank"><span class="fa-stack fa-lg" id="fbicon" title="Facebook"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>&nbsp;Facebook</a></li>
                            @endif
                            @if(!empty($kontak->tw))
                            <li><a href="{{url($kontak->tw)}}" target="_blank"><span class="fa-stack fa-lg" id="tw" title="Twitter"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>&nbsp;Twitter</a></li>
                            @endif
                            @if(!empty($kontak->gp))
                            <li><a href="{{url($kontak->gp)}}" target="_blank"><span class="fa-stack fa-lg" id="gp" title="Google+"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x fa-inverse"></i></span>&nbsp;Google+</a></li>
                            @endif
                            @if(!empty($kontak->pt))
                            <li><a href="{{url($kontak->pt)}}" target="_blank"><span class="fa-stack fa-lg" id="pt" title="Pinterest"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pinterest fa-stack-1x fa-inverse"></i></span>&nbsp;Pinterest</a></li>
                            @endif
                            @if(!empty($kontak->tl))
                            <li><a href="{{url($kontak->tl)}}" target="_blank"><span class="fa-stack fa-lg" id="tl" title="Tumblr"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-tumblr fa-stack-1x fa-inverse"></i></span>&nbsp;Tumblr</a></li>
                            @endif
                            @if(!empty($kontak->ig))
                            <li><a href="{{url($kontak->ig)}}" target="_blank"><span class="fa-stack fa-lg" id="ig" title="Instagram"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></span>&nbsp;Instagram</a></li>
                            @endif
                            @if(!empty($kontak->picmix))
                            <li>
                                <a href="{{url($kontak->picmix)}}" target="_blank" title="Picmix">
                                    <img class="picmix" src="//d3kamn3rg2loz7.cloudfront.net/blogs/event/icon-picmix.png">&nbsp;Picmix
                                </a>
                            </li>
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
               <p>Copyright &copy; {{date('Y')}} {{ short_description(Theme::place('title'),150) }}. All Right Reserved. Powered by <a class="copyright" target="_blank" href="http://jarvis-store.com">Jarvis Store</a></p>
            </div>
        </div>
    </div>
</footer>
{{pluginPowerup()}} 