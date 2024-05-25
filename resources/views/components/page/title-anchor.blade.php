@props(['listNumber' => false])

<div class="accordion" id="more">
    <div class="accordion-item">
        <h2 class="accordion-header header-totitle">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#more1" aria-expanded="false" aria-controls="more1">
                Содержание
            </button>
        </h2>
        <div id="more1" class="accordion-collapse collapse" data-bs-parent="#more">
            <div class="accordion-body">
                @if($listNumber)
                <ol id="left-bar-anchors"></ol>
                @else
                <ul id="left-bar-anchors"></ul>
                @endif
            </div>
        </div>
    </div>
</div>
