<?php
    if(isset($_POST['theloai'])){
        $tl=$_POST["theloai"];
        $url="https://api.themoviedb.org/3/movie/popular?api_key=12baa83af9302206b6af65913d262a81&language=en-US&page=$tl";
        $data = file_get_contents($url);
        $data = json_decode($data);
        for($i=0;$i<6;$i++){
            $value=$data->results[$i];
            $urlD="https://api.themoviedb.org/3/movie/$value->id?api_key=12baa83af9302206b6af65913d262a81&language=en-US";
            $detail=file_get_contents($urlD);
            $detail=json_decode($detail);
            $qg=$detail->spoken_languages[0];
            $ten="";
            $tl="";
            if($detail->runtime==0)
                $detail->runtime="Sắp ra mắt";
            else
                $detail->runtime="Thời gian : ".$detail->runtime." phút";
            foreach($detail->genres as $genres)
            {
                $ten=$ten.$genres->name." ";
            }
            echo "<div class='col-6 mt-5 d-flex'>
                        <a href='/movie/$value->id'>
                            <div class='movie-img'>
                                <img src='https://image.tmdb.org/t/p/w500/$value->poster_path' alt='' class='movie-img-item'>
                                <span class='quality'>FullHD</span>
                            </div>
                        </a>
                        <div class='movie-content'>
                            <h3 class='movie-content-title'>
                                $value->title
                            </h3>
                            <p class='movie-content-title-engl'>
                                $detail->runtime
                            </p>
                            <p class='movie-content-category'>
                                Thể loại : $ten    
                            </p>
                            <p class='movie-content-country'>
                                Quốc gia : $qg->english_name
                            </p>
                            <p class='movie-content-imbd'>
                                iMDb $value->vote_average
                            </p>
                            <p class='movie-content-title-engl'>
                                Năm : $value->release_date
                            </p>
                            <p class='movie-content-desc'>
                                $value->overview
                            </p>
                        </div>
                    </div>";
        }
    }
?>