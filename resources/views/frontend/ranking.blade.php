@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Rankings</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Year</th>
                            <th scope="col">Name of University Rankings</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--start 2024-->
                        <tr>
                            <th scope="row" rowspan="1">2024</th>
                            <td>
                                <p></p>
                                <a href="https://www.topuniversities.com/universities/daffodil-international-university" target="_blank">DIU Ranked 3rd among Private Universities and 5th in Bangladesh in QS World University Rankings 2024</a>
                            </td>
                            <td>
                                <a href="https://www.topuniversities.com/universities/daffodil-international-university" target="_blank"><img src="{{asset('images/ranking24-1.jpg')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 350px; max-height: 120px;"></a>
                            </td>
                        </tr>
                        <!--start 2023-->
                        <tr>
                            <th scope="row" rowspan="3">2023</th>
                            <td>
                                <p></p>
                                <a href="https://www.timeshighereducation.com/impactrankings" target="_blank">DIU Ranked 2nd in Bangladesh and overall 401-600 in the world by THE Impact Rankings 2023</a>
                            </td>
                            <td>
                                <a href="https://www.timeshighereducation.com/impactrankings" target="_blank"><img src="{{asset('images/times_higher_education.jpg')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 350px; max-height: 120px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.topuniversities.com/university-rankings/asia-university-rankings/2023" target="_blank">DIU has been ranked 3rd among all private Universities of Bangladesh in QS Asia Rankings-2023</a>
                            </td>
                            <td>
                                <a href="https://www.topuniversities.com/university-rankings/asia-university-rankings/2023" target="_blank"><img src="{{asset('images/img-2-23.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 350px; max-height: 120px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.wuri.world/%EB%B3%B5%EC%A0%9C-2022-top-50-student-mobility-and" target="_blank">DIU Ranked within Top 50 World Universities (Student Mobility and Openness) by WURI Ranking 2023</a>
                            </td>
                            <td>
                                <a href="https://www.wuri.world/%EB%B3%B5%EC%A0%9C-2022-top-50-student-mobility-and" target="_blank"><img src="{{asset('images/2022-4.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 350px; max-height: 120px;"></a>
                            </td>
                        </tr>
                        <!--start 2022-->
                        <tr>
                            <th scope="row" rowspan="6">2022</th>
                            <td>
                                <p></p>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2022" target="_blank">DIU is the Most Sustainable University in Bangladesh as Per UI-Greenmetric World University Rankings 2022</a>
                            </td>
                            <td>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2022" target="_blank"><img src="{{asset('images/Rank-5.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.topuniversities.com/universities/daffodil-international-university#888193" target="_blank">DIU Ranked within Top 400 (351-400) Asian Universities by QS World University Rankings (Asia) 2022</a>
                            </td>
                            <td>
                                <a href="https://www.topuniversities.com/universities/daffodil-international-university#888193" target="_blank"><img src="{{asset('images/Rank-1.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.timeshighereducation.com/rankings/impact/2022/overall" target="_blank">DIU Again Topped in Bangladesh and 301-400 Globally by Times Higher Education Impact Rankings 2022 </a>
                            </td>
                            <td>
                                <a href="https://www.timeshighereducation.com/rankings/impact/2022/overall" target="_blank"><img src="{{asset('images/2022-2.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.topuniversities.com/universities/daffodil-international-university#888193" target="_blank">DIU ranked 490th in U-MultiRank-2022</a>
                            </td>
                            <td>
                                <a href="https://www.umultirank.org/compare?co&instutionalField=true&mode=likewithlike&name=null&pref-4=1&pref-4=2&section=compareRegion&sightMode=undefined&sortCol=overallPerformance&sortOrder=desc&trackType=compare" target="_blank"><img src="{{asset('images/2022-3.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.wuri.world/%EB%B3%B5%EC%A0%9C-2021-global-top-100" target="_blank">WURI-2022 Ranked Daffodil International University</a>
                            </td>
                            <td>
                                <a href="https://www.wuri.world/%EB%B3%B5%EC%A0%9C-2021-global-top-100" target="_blank"><img src="{{asset('images/2022-4.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.tbsnews.net/bangladesh/education/despite-progress-bangladesh-still-lags-behind-neighbours-research-publications" target="_blank">DIU Ranked 2nd in Research Rankings 2022 among all public & private universities in Bangladesh</a>
                            </td>
                            <td>
                                <a href="https://www.tbsnews.net/bangladesh/education/despite-progress-bangladesh-still-lags-behind-neighbours-research-publications" target="_blank"><img src="{{asset('images/Rank-9.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <!------------------------------------>
                        <tr>
                            <th scope="row" rowspan="5">2021</th>
                            <td>
                                <p></p>
                                <a href="https://www.topuniversities.com/university-rankings/asian-university-rankings/2021" target="_blank">DIU Ranked within Top 450 (401-450) Asian Universities by QS World University Rankings (Asia) 2021</a>
                            </td>
                            <td>
                                <a href="https://www.topuniversities.com/university-rankings/asian-university-rankings/2021" target="_blank"><img src="{{asset('images/Rank-2.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.timeshighereducation.com/world-university-rankings/daffodil-international-university-diu" target="_blank">DIU Topped in Bangladesh and 301-400 Globally by Times Higher Education Impact Rankings 2021 </a>
                            </td>
                            <td>
                                <a href="https://www.timeshighereducation.com/world-university-rankings/daffodil-international-university-diu" target="_blank"><img src="{{asset('images/Rank-3.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.scimagoir.com/rankings.php?country=BGD" target="_blank">DIU Included in SCIMAGO Institutions Ranking 2021 - A Global Journal Ranking Institute </a>
                            </td>
                            <td><a href="https://www.scimagoir.com/rankings.php?country=BGD" target="_blank" target="_blank"><img src="{{asset('images/Rank-4.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a></td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2021/daffodilvarsity.edu.bd" target="_blank">DIU Topped in Bangladesh and 175th Globally by UI-GreenMetric World University Rankings 2021</a>
                            </td>
                            <td><a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2021/daffodilvarsity.edu.bd" target="_blank"><img src="images/Rank-5.png" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a></td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.umultirank.org/study-at/daffodil-international-university-rankings/" target="_blank">DIU Ranked within Top 750 Global Universities by U-Multirank </a>
                            </td>
                            <td><a href="https://www.umultirank.org/study-at/daffodil-international-university-rankings/" target="_blank"><img src="{{asset('images/Rank-6.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a></td>
                        </tr>
                        <tr>
                            <th scope="row"  rowspan="4">2020</th>
                            <td>
                                <p></p>
                                <a href="https://www.timeshighereducation.com/rankings/impact/2020/overall#!/page/0/length/25/sort_by/rank/sort_order/asc/cols/undefined" target="_blank">DIU Ranked 2nd in Bangladesh and 301-400 Globally by Times Higher Education Impact Rankings 2020</a>
                            </td>
                            <td>
                                <a href="https://www.timeshighereducation.com/rankings/impact/2020/overall#!/page/0/length/25/sort_by/rank/sort_order/asc/cols/undefined" target="_blank"><img src="{{asset('images/Rank-7.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 110px;"></a>
                            </td>
                        </tr>
                            <tr>
                            <td>
                                <p></p>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2020" target="_blank">DIU Topped in Bangladesh and 181st Globally by UI-GreenMetric World University Rankings 2020</a>
                            </td>
                            <td>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2020" target="_blank"><img src="{{asset('images/Rank-8.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://the-prominent.com/others-article-6351/" target="_blank">DIU is the top private University as per Scopus Indexed Publications in 2020</a>
                            </td>
                            <td>
                                <a href="https://the-prominent.com/others-article-6351/" target="_blank"><img src="{{asset('images/Rank-9.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 120px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.4icu.org/bd/" target="_blank">DIU is the 2nd ranked University among all Private University in Bangladesh, 2020 </a>
                            </td>
                            <td>
                                <a href="https://www.4icu.org/bd/" target="_blank"><img src="{{asset('images/Rank-10.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="5">2019</th>
                            <td>
                                <p></p>
                                <a href="https://www.topuniversities.com/university-rankings/asian-university-rankings/2019" target="_blank">DIU Ranked within Top 500 Asian Universities by QS World University Rankings (Asia) 2019</a>
                            </td>
                            <td>
                                <a href="https://www.topuniversities.com/university-rankings/asian-university-rankings/2019" target="_blank"><img src="{{asset('images/Rank-11.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://www.timeshighereducation.com/rankings/impact/2019/overall#!/page/0/length/25/sort_by/rank/sort_order/asc/cols/undefined" target="_blank">DIU Ranked within Top 300 Global Universities by Times Higher Education University Impact Rankings 2019</a>
                            </td>
                            <td>
                                <a href="https://www.timeshighereducation.com/rankings/impact/2019/overall#!/page/0/length/25/sort_by/rank/sort_order/asc/cols/undefined" target="_blank"><img src="{{asset('images/Rank-12.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://scientificbangladesh.com/only-6000-scientific-documents-in-2019-in-the-scopus-database-with-bangladeshi-affiliation/" target="_blank">Scientific Bangladesh Ranking on Scopus Publications </a>
                            </td>
                            <td>
                                <a href="https://scientificbangladesh.com/only-6000-scientific-documents-in-2019-in-the-scopus-database-with-bangladeshi-affiliation/" target="_blank"><img src="{{asset('images/Rank-13.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="" target="_blank">DIU is the top private University as per Scopus Indexed Publications in 2019</a>
                            </td>
                            <td>
                                <a href="" target="_blank"><img src="{{asset('images/Rank-14.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2019" target="_blank">DIU Topped in Bangladesh and 150th Globally by UI-GreenMetric World University Rankings 2019</a>
                            </td>
                            <td>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2019" target="_blank"><img src="{{asset('images/Rank-5.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2018</th>
                            <td>
                                <p></p>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2018" target="_blank">DIU Topped in Bangladesh and 158th Globally by UI-GreenMetric World University Rankings 2018</a>
                            </td>
                            <td>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2018" target="_blank"><img src="{{asset('images/Rank-5.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2017</th>
                            <td>
                                <p></p>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2017" target="_blank">DIU Topped in Bangladesh and 153rd Globally by UI-GreenMetric World University Rankings 2017 </a>
                            </td>
                            <td>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2017" target="_blank"><img src="{{asset('images/Rank-5.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2016</th>
                            <td>
                                <p></p>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2016" target="_blank">DIU Topped in Bangladesh and 453rd Globally by UI-GreenMetric World University Rankings 2016</a>
                            </td>
                            <td>
                                <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2016" target="_blank"><img src="{{asset('images/Rank-5.png')}}" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px; max-height: 100px;"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
		</div>
    </div>
</section> 
@endsection
