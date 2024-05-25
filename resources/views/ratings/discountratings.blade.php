<div class="rating">
    <ul>
        <li>
            <?php 
                $learn = 0;
                $price = 0;
                $value = 0;
                $sub_total = 0;
                $sub_total = 0;
                $reviews = App\ReviewRating::where('course_id', $courseId)->get();
            ?>
            @if(!empty($reviews[0]))
            <?php
                $count = App\ReviewRating::where('course_id', $courseId)->count();
                foreach($reviews as $review) {
                    $learn = $review->price * 5;
                    $price = $review->price * 5;
                    $value = $review->value * 5;
                    $sub_total = $sub_total + $learn + $price + $value;
                }
                $count = ($count * 3) * 5;
                $rat = $sub_total / $count;
                $ratings_var = ($rat * 100) / 5;
            ?>
            <div class="pull-left">
                <div class="star-ratings-sprite">
                    <span style="width: <?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                </div>
            </div>
            @else
            <div class="pull-left">{{ __('No Rating') }}</div>
            @endif
        </li>
        <!-- overall rating -->
        <?php 
            $learn = 0;
            $price = 0;
            $value = 0;
            $sub_total = 0;
            $count = count($reviews);
            $onlyrev = array();
            $reviewcount = App\ReviewRating::where('course_id', $courseId)->WhereNotNull('review')->get();
            foreach($reviews as $review) {
                $learn = $review->learn * 5;
                $price = $review->price * 5;
                $value = $review->value * 5;
                $sub_total = $sub_total + $learn + $price + $value;
            }
            $count = ($count * 3) * 5;
            if($count != "" && $count != '0') {
                $rat = $sub_total / $count;
                $ratings_var = ($rat * 100) / 5;
                $overallrating = ($ratings_var / 2) / 10;
            }
        ?>
        @php
        $reviewsrating = App\ReviewRating::where('course_id', $courseId)->first();
        @endphp
        @if(!empty($reviewsrating))
        <!-- <li>
            <b>{{ round($overallrating, 1) }}</b>
        </li> -->
        @endif
        <li class="reviews">
            (@php
            $data = App\ReviewRating::where('course_id', $courseId)->count();
            if($data > 0) {
                echo $data;
            }
            else {
                echo "0";
            }
            @endphp Reviews)
        </li>
    </ul>
</div>
