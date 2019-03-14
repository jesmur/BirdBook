<div class="col-md-6 col-md-offset-2">
    <form action="/admin/users/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="col-sm-10 input-group">
            <input type="text" class="form-control" name="searchTerm" id="searchTerm" placeholder="Name or email"
            @if(isset($searchTerm))
                value="<?php echo htmlspecialchars($searchTerm); ?>"
            @endif>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </form>
</div>