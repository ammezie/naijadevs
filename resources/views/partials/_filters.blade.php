<div class="ui basic segment bgWhite roundBordered">
    <form class="ui form" action="{{ url('/filters') }}">
        <div class="four fields">
            <div class="field">
                <div class="ui selection dropdown">
                    <input type="hidden" name="category" value="{{ request()->category }}">
                    <i class="dropdown icon"></i>
                    <div class="default text">Category</div>
                    <div class="menu">
                        @foreach ($categories as $category)
                            <div class="item" data-value="{{ $category->slug }}">{{ $category->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="ui selection dropdown">
                    <input type="hidden" name="type" value="{{ request()->type }}">
                    <i class="dropdown icon"></i>
                    <div class="default text">Type</div>
                    <div class="menu">
                        @foreach ($jobTypes as $type)
                            <div class="item" data-value="{{ $type->slug }}">{{ $type->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="field" id="location">
                <div class="ui search selection dropdown">
                    <input type="hidden" name="location" value="{{ request()->location }}">
                    <i class="dropdown icon"></i>
                    <div class="default text">Location</div>
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
                        {{ request()->is_remote ? 'checked' : '' }}
                        tabindex="0">
                    <label for="is_remote">Remote</label>
                </div>
            </div>
            <div class="field">
                <button type="submit" class="ui primary button">Filter</button>
            </div>
        </div>
    </form>
</div>