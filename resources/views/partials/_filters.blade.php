<form class="ui form" action="{{ url('/filters') }}">
    <div class="fields">
        <div class="field">
            <div class="ui selection dropdown">
                <input type="hidden" name="category">
                <i class="dropdown icon"></i>
                <div class="default text">Filter by job category</div>
                <div class="menu">
                    @foreach ($categories as $category)
                        <div class="item" data-value="{{ $category->slug }}">{{ $category->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui selection dropdown">
                <input type="hidden" name="type">
                <i class="dropdown icon"></i>
                <div class="default text">Filter by job type</div>
                <div class="menu">
                    @foreach ($jobTypes as $type)
                        <div class="item" data-value="{{ $type->slug }}">{{ $type->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="field" id="location">
            <div class="ui search selection dropdown">
                <input type="hidden" name="location">
                <i class="dropdown icon"></i>
                <div class="default text">Filter by job location</div>
                <div class="menu">
                    @foreach ($locations as $location)
                        <div class="item" data-value="{{ $location->slug }}">{{ $location->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input
                    type="checkbox"
                    id="is_remote"
                    name="is_remote"
                    value="true"
                    {{ old('is_remote') ? 'checked' : '' }}
                    tabindex="0">
                <label for="is_remote">Remote</label>
            </div>
        </div>
        <div class="field">
            <button type="submit" class="ui primary button">Filter</button>
        </div>
    </div>
</form>