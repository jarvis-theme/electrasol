<div class="block newsletter_left">
    <div class="block-content">
        <h2>Newsletter</h2>
        <p>Subscribe our Newsletter</p>
        <form action="{{@$mailing->action}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form newsletter" class="validate" target="_blank" novalidate>
            <input type="text" placeholder="Email address" name="email">
            <button class="submit" type="submit" {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}><span>subscribe</span></button>
        </form>
    </div>
</div>