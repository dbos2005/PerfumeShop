<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Parfumerie Muse</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="img/Parfumerie (3).png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inter:wght@100..900&family=Outfit:wght@100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
</head>

<body class="col-12" onload="loadProduct(0);">
          <?php
    include "header.php";
        ?>   
    <!-- carousel -->
    <div class="col-12" id="basicSearch">
        <div class="carousel mt-3">
            <!-- list item -->
            <div class="list">
                <div class="item">
                    <img src="img/itemAds/1.png">
                    <div class="content">
                        <div class="author">PARFUMERIC MUSE</div>
                        <div class="title">Miss Dior</div>
                        <div class="topic fs-1 ">A Timeless Floral Symphony</div>
                        <div class="des ">
                           
                            Miss Dior is a timeless classic that exudes elegance and charm. This fragrance opens with a burst of fresh, sparkling Bergamot, leading into a heart that blooms with the sophisticated and delicate Grasse Rose, perfectly capturing the essence of femininity
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/2.png">
                    <div class="content">
                        <div class="author">PARFUMERIC MUSE</div>
                        <div class="title">Sauvage</div>
                        <div class="topic ">For Men's</div>
                        <div class="des">
                            Sauvage by Dior is a bold and powerful fragrance that embodies raw masculinity and untamed nature. The composition opens with a refreshing burst of Calabrian Bergamot, providing a zesty and invigorating start </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/3.png">
                    <div class="content">
                        <div class="author">PARFUMERIC MUSE</div>
                        <div class="title">1 Million</div>
                        <div class="topic fs-1">Unforgettable!</div>
                        <div class="des">
                            1 Million by Paco Rabanne is a luxurious and provocative fragrance that embodies opulence and sophistication. The scent opens with a tantalizing blend of Blood Mandarin and Peppermint, creating a fresh and invigorating start. The heart reveals a unique combination of Rose and Cinnamon, adding a touch of warmth and spice. </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/5.png">
                    <div class="content">
                        <div class="author">PARFUMERIC MUSE</div>
                        <div class="title">Bleu de Chanel</div>
                        <div class="topic fs-1">freshness and depth with effortless style</div>
                        <div class="des">
                            Bleu de Chanel by Chanel is a sophisticated and versatile fragrance that embodies elegance and freedom. It opens with a refreshing burst of Citrus Accord, providing a clean and invigorating start. The heart of the fragrance features Labdanum, which adds a warm and resinous depth, while the base is anchored by rich and creamy Sandalwood, creating a well-balanced and enduring scent. </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/6.png">
                    <div class="content">
                        <div class="author">PARFUMERIC MUSE</div>
                        <div class="title text-black">Unisex</div>
                        <div class="topic fs-1">Fresh and Versatile</div>
                        <div class="des text-black-50">
                            A perfect blend of freshness and depth, this unisex fragrance is designed to be universally appealing, transcending gender boundaries. It opens with the bright and zesty notes of Bergamot, which immediately uplift the senses. </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- list thumnail -->
            <div class="thumbnail">
                <div class="item">
                    <img src="img/itemAds/www.reallygreatsite.com (6).png">
                    <div class="content">
                        <div class="title">
                            Miss Dior
                        </div>
                        <div class="description">
                            Miss Dior is a timeless classic...
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/0_SZXaAMEav878RdAL.jpg">
                    <div class="content">
                        <div class="title">
                            Sauvage
                        </div>
                        <div class="description">
                            Sauvage by Dior is a bold and ...
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/1-million-parfum-a.jpg">
                    <div class="content">
                        <div class="title">
                            1 Million
                        </div>
                        <div class="description">
                            1 Million by Paco Rabanne ...
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/61f80b4907825a708d6cd59f_Screen Shot 2022-01-31 at 7.15.14 PM.png">
                    <div class="content">
                        <div class="title">
                            Bleu de Chanel
                        </div>
                        <div class="description">
                            Bleu de Chanel by Chanel is ...
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="img/itemAds/www.reallygreatsite.com (7).png">
                    <div class="content">
                        <div class="title text-black">
                            Unisex
                        </div>
                        <div class="description text-black">
                            A perfect blend of freshness ...
                        </div>
                    </div>
                </div>
            </div>
            <!-- next prev -->

            <div class="arrows">
                <button id="prev">
                    < </button>
                        <button id="next">></button>
            </div>
            <!-- time running -->
            <div class="time"></div>
        </div>
        <!-- carousel -->
        <div class="col-12 bg-white d-flex justify-content-center">
            <div class="text-center col-10">
                <img src="img/Parfumerie (3).png" class="w-25" alt="">
                <p class="text-black fw-bold fs-1">New Stock</p>
                <p class="text-black quicksand">Explore the PARFUMERIC MUSE's latest vial arrivals1 Discover the perfect fragrance for youself or an exclusive gift for your loved one in our newest collection</p>
                <p class="fw-bold text-black" style="text-decoration: underline orange;">CONTINUE SHOPPING</p>
            </div>
        </div>      


        <div class="col-12 bg-body justify-content-center d-flex ">
            <div class="col-lg-10 col-12">
                <!-- product listing -->
                <div class="row gap-1 gap-lg-3 justify-content-center" id="product_card">

                    <div>

                    </div>

                </div>
                <!-- product listing -->

                <!-- Category -->
                <div class="col-lg-12 col-10 mt-2">
                    <div class="row gap-2 gap-md-3 d-flex justify-content-center ">
                        <div class="col-lg-3 col-10  text-center container  rounded rounded-5 border-black bor">
                            <img class="image rounded rounded-5" src="https:/i0.wp.com/scentson.lk/wp-content/uploads/2022/12/men.webp?fit=428%2C800&amp;ssl=1" width="300px" height="500px" alt="">
                            <div class="middle">
                                <div class="text quicksand fw-bold fs-4">For Men's</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-10  text-center container rounded rounded-5 border-black">

                            <img class="image rounded rounded-5" src="https://i0.wp.com/scentson.lk/wp-content/uploads/2022/12/Her.webp?w=430&ssl=1" width="300px" height="500px" alt="">
                            <div class="middle">
                                <div class="text quicksand fw-bold fs-4">For Women's</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-10 text-center container rounded rounded-5 border-black">
                            <img class="image rounded rounded-5" src="https://i0.wp.com/scentson.lk/wp-content/uploads/2022/12/Unisex.webp?w=430&ssl=1" width="300px" height="500px" alt="">
                            <div class="middle">
                                <div class="text quicksand fw-bold fs-4">For Unisex</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Category -->

                <!-- perfume Details-->

                <div class="col-lg-12 col-10 mt-3">
                    <h1 class="text-center text-uppercase text-black">fragrance families</h1>
                    <p class="text-center text-black-50">The first step to finding your favourite fragrance is to understand the different scent families that every scent is based on.</p>
                    <div class="row ">
                        <div class="col-lg-4 col-10 col-md-6">
                            <img src="https://i0.wp.com/scentson.lk/wp-content/uploads/2023/12/uniques_lk_aromatic.webp?w=920&ssl=1" width="400" height="400">
                            <div class="col-lg-10 col-12 offset-2">
                                <h2>
                                    Aromatics
                                </h2>
                                <p class="quicksand">
                                    Overall comprise of fresh green herbs such as rosemary, thyme, sage, lavender and other plants which possess a very intensive grass-spicy scent. They are often blended with citrusy and spicy notes. Aromatic compositions are typical of fragrances for men. The best springtime fragrances tend to feature many aromatic note.
                                </p>
                            </div>

                        </div>
                        <div class="col-lg-4 col-10">
                            <img  src="https://i0.wp.com/scentson.lk/wp-content/uploads/2023/12/uniques_lk_leather_001.webp?w=1000&ssl=1" width="400" height="400">
                            <div class="col-lg-10 col-8 offset-2">
                                <h2>
                                    Leather
                                </h2>
                                <p class="quicksand">
                                    Tanning leather brought abou new dawn of perfumery. As the process was so foul smelling, tanneries would scent the finished products to mask the unpleasant odours of ammonia. The pleasant fragrances created with smoke, wood, resigns and honey combined with the skins' aldehydic notes went on to become quite desirable. </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-10 col-sm-10">
                            <img  src="https://i0.wp.com/scentson.lk/wp-content/uploads/2022/01/7d2c81c9-7213-4e51-a448-bb068464ef6e.jpg?w=1280&ssl=1" width="400" height="400">
                            <div class="col-lg-10 col-8 offset-2">
                                <h2>
                                    Citrus
                                </h2>
                                <p class="quicksand">
                                    Characterized by its zesty and fresh notes that are desired for warmer, sunnier climates. Some fruits that are often found includes clementine, grapefruit, lemons and bergamot. They provide a refreshing and effervescent top note that tickles the nose with pleasure and brings an air of optimism and an easy elegance to the wearer.
                            </div>
                        </div>
                        <div class="col-lg-4 col-10 col-sm-10">
                            <img src="https://i0.wp.com/scentson.lk/wp-content/uploads/2023/12/uniques_lk_floral_001.webp?w=1000&ssl=1" width="400" height="400">
                            <div class="col-lg-10 col-8 offset-2">
                                <h2>
                                    Floral
                                </h2>
                                <p class="quicksand">
                                    Consist of notes from floral bouquets and are usually found in the heart notes of a scent. Flowers found within these categories may consist of beautiful florals like jasmine, orange blossom, and rose or peony. The versatility of these flowers allows each fragrance to be carefully created for any occasion and any season. </p>
                            </div>

                        </div>
                        <div class="col-lg-4 col-10 col-sm-10">
                            <img src="https://i0.wp.com/scentson.lk/wp-content/uploads/2023/12/uniques_lk_oriental_001-1.webp?w=1000&ssl=1" width="400" height="400">
                            <div class="col-lg-10 col-8 offset-2">
                                <h2>
                                    Oriental
                                </h2>
                                <p class="quicksand">
                                    Exotic essences comprise of exotic herbs and spices such as vanilla and citrus as well as aldehydes. Resins, woods and amber create markedly warm and sensual aromas that can be powdery or dry. The musk of an oriental fragrance is often opulent and heady, which can be otherwise softened with more amber notes.
                            </div>
                        </div>
                        <div class="col-lg-4 col-10 col-md-6">
                            <img src="https://i0.wp.com/scentson.lk/wp-content/uploads/2022/01/uniques_lk_citrus-2.jpg?w=910&ssl=1" width="400" height="400">
                            <div class="col-lg-10 col-8 offset-2">
                                <h2>
                                    Woody
                                </h2>
                                <p class="quicksand">
                                    Distinctive by their opulent woody character with notes coming from woods materials like trees, resin, moss, pine & roots. Wood ingredients add richness, warmth, elegance and a depth to a fragrance and are key in perfume making. Fragrances that are dominated by woody scents typically contain Sandalwood, Pine, Vetiver and Cedarwood.
                            </div>
                        </div>

                    </div>

                </div>

                <!-- perfume Detials-->
                
            </div>
        </div>
        <div class="col-lg-12  d-flex justify-content-center ">

            <div class="vw-100">
                <marquee behavior="scroll" direction="left">
                    <img src="img/brand/addiad.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/boss.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/dior.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/gg.png" width="150px" height="80px" alt="">
                    <img src="img/brand/givenchy.png" width="150px" height="70px" alt="">
                    <img src="img/brand/gucci.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/jennifer_lopez.png" width="150px" height="70px" alt="">
                    <img src="img/brand/lattafa.jpeg" width="150px" height="70px" alt="">
                    <img src="img/brand/nike.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/versace.jpg" width="150px" height="80px" alt="">
                    <img src="img/brand/addiad.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/boss.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/dior.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/gg.png" width="150px" height="70px" alt="">
                    <img src="img/brand/givenchy.png" width="150px" height="70px" alt="">
                    <img src="img/brand/gucci.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/jennifer_lopez.png" width="150px" height="70px" alt="">
                    <img src="img/brand/lattafa.jpeg" width="150px" height="70px" alt="">
                    <img src="img/brand/nike.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/versace.jpg" width="150px" height="80px" alt="">
                </marquee>
                <marquee behavior="scroll" direction="right">
                    <img src="img/brand/addiad.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/boss.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/dior.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/gg.png" width="150px" height="70px" alt="">
                    <img src="img/brand/givenchy.png" width="150px" height="70px" alt="">
                    <img src="img/brand/gucci.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/jennifer_lopez.png" width="150px" height="70px" alt="">
                    <img src="img/brand/lattafa.jpeg" width="150px" height="70px" alt="">
                    <img src="img/brand/nike.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/versace.jpg" width="150px" height="80px" alt="">
                    <img src="img/brand/addiad.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/boss.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/dior.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/gg.png" width="150px" height="70px" alt="">
                    <img src="img/brand/givenchy.png" width="150px" height="70px" alt="">
                    <img src="img/brand/gucci.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/jennifer_lopez.png" width="150px" height="70px" alt="">
                    <img src="img/brand/lattafa.jpeg" width="150px" height="70px" alt="">
                    <img src="img/brand/nike.jpg" width="150px" height="70px" alt="">
                    <img src="img/brand/versace.jpg" width="150px" height="80px" alt="">
                </marquee>
            </div>

        </div>
    </div>

    <div class="col-12" id="footer">
        <?php
     include "footer.php";    ?>
    </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="app.js"></script>
    <script src="path-to-the-file/splide.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>