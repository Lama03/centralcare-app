<ul class="list-inline social-icons">
    @if(isset($settings['facebook']))
        <li class="list-inline-item">
            <a href="{{ $settings['facebook'] ?? 'javascript:void(0)' }}" title="Facebook">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/facebook-svg.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    @endif

    @if( isset($settings['twitter']) )
        <li class="list-inline-item">
            <a href="{{ $settings['twitter'] ?? 'javascript:void(0)' }}" title="Twitter">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/twitter-svg.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    @endif

    @if( isset($settings['instagram']) )
        <li class="list-inline-item">
            <a href="{{ $settings['instagram'] ?? 'javascript:void(0)' }}" title="Instagram">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/instagram-svg.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    @endif

    @if( isset($settings['youtube']) )
        <li class="list-inline-item">
            <a href="{{ $settings['youtube'] ?? 'javascript:void(0)' }}" title="YouTube">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/youtube-svg.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    @endif

    @if( isset($settings['whatsapp']) )
        <li class="list-inline-item">
            <a href="https://wa.me/+966{{ $settings['whatsapp'] ?? 'javascript:void(0)' }}" title="Whasapp" target="_blank">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/whatsapp-svg.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    @endif

    @if( isset($settings['snapchat']) )
        <li class="list-inline-item">
            <a href="{{ $settings['snapchat'] ?? 'javascript:void(0)' }}" title="Snapchat">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/snapchat-svg.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    @endif

    @if( isset($settings['tiktok']) )
        <li class="list-inline-item">
            <a href="{{ $settings['tiktok'] ?? 'javascript:void(0)' }}" title="Snapchat">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/tiktok.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    @endif
</ul>
