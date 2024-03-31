<style>
    body{

    background-color: #eee;
}

.wrapper{

    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.page-link {
    position: relative;
    display: block;
    color: #1279ff;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #1279ff !important;
}


.page-link:hover {
    z-index: 2;
    color: #fff !important;
    background-color: #1279ffa1;
    border-color: #024dbc;
}
.pagination{
    --bs-pagination-active-bg:#1279ff;
}
.page-link-active {
    color: #fff; /* Set the text color for active pagination link */
}

.page-link:focus {
    z-index: 3;
    outline: 0;
    box-shadow: none;
}
</style>
@if($paginator->hasPages())
    <nav class="page-section">
        <ul class="pagination">
            @if($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0)" aria-label="Previous"
                        style="color:#6c757d;">
                        <span aria-hidden="true">
                            <i class="fa fa-chevron-left"></i>
                        </span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{$paginator->previousPageUrl()}}" aria-label="Previous">
                        <span aria-hidden="true">
                            <i class="fa fa-chevron-left"></i>
                        </span>
                    </a>
                </li>
            @endif
            
            
            @foreach ($elements as $element)
                @if(is_string($element))
                    <li class="page-item disabled">
                        <a class="page-link-active" href="javascript:void(0)">{{$element}}</a>
                    </li>
                @endif

                @if(is_array($element))
                    @foreach ($element as $page=>$url)
                        @if($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">{{$page}}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{$url}}">{{$page}}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            


            @if($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{$paginator->nextPageUrl()}}" class="page-link" aria-label="Next">
                        <span aria-hidden="true">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a href="javascript:void(0)" class="page-link" aria-label="Next" style="color:#6c757d;">
                        <span aria-hidden="true">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif