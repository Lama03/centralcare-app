@if ($paginator->lastPage() > 1)
    <nav aria-label="Page navigation"> 
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link btn btn-white btn-tab" href="{{ $paginator->url($paginator->currentPage()-1) }}">{{ __('messages.Previous') }}</a>
            </li>
            <?php
                if($paginator->lastPage() <= 4){
                $count = $paginator->lastPage();
                } else {
                $count = 4; 
                }
            ?>
            @for ($i = 1; $i <= $count; $i++) 
            <li class="page-item"><a class="page-link btn btn-white btn-tab {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endfor
            @if($paginator->lastPage() > 4)
            <li class="page-item d-flex align-items-end"><span>...</span></li>
            @if($paginator->lastPage() > 100)
            <li class="page-item"><a class="page-link btn btn-white btn-tab btn btn-white btn-tab {{ ($paginator->currentPage() == $paginator->lastPage()/2) ? ' active' : '' }}" href="{{ $paginator->url($paginator->lastPage()/2) }}">{{ $paginator->lastPage()/2 }}</a></li>
            @endif
            <li class="page-item"><a class="page-link btn btn-white btn-tab btn btn-white btn-tab {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' active' : '' }}" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif
            @if($paginator->currentPage() < $paginator->lastPage())
            <li class="page-item">
                <a class="page-link btn btn-white btn-tab" href="{{ $paginator->url($paginator->currentPage()+1) }}">{{ __('messages.Next') }}</a>
            </li>
            @endif
        </ul>
    </nav>
@endif