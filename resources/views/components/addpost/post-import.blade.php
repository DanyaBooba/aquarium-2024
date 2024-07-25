<div class="addpost-import-container">
    <div class="addpost-import">
        <h4>
            {{ __('Импортируйте записи из других соцсетей') }}
        </h4>
        <p>
            {{ __('Для этого достаточно просто поделиться ссылкой на пост.') }}
        </p>
        <p>
            <a href="{{ route('user.importpost') }}">
                {{ __('Импортировать посты') }}
            </a>
        </p>
    </div>
</div>
