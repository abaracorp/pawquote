@extends('frontend.master')

@section('content')
<main id="view-success-story">
    <section class="article-top">
        <div class="container">
            <div class="heading">
                <h1 class="c-dark f-56 l-h-72 f-w-5 freedoka mb-0">{{$fan->title ?? ''}}</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="article-image">
                        <img src="{{$fan->image_url ?? ''}}" alt="Image">
                    </div>
                </div>
            </div>

            {!! $fan->content ?? '' !!}

            {{-- <ul>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat">
                        When Bella was first diagnosed with cancer, our world came crashing down. She had always been
                        such a vibrant, loving companion – from the moment she bounded into our lives as a puppy, she
                        brought so much joy and light into our home. Watching her grow up alongside our kids, seeing her
                        chase butterflies in the yard, and cuddle up with us on the couch every evening had become an
                        irreplaceable part of our daily life.
                    </p>
                </li>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat">
                        So when the vet delivered the news that she had cancer, we were devastated. I remember sitting
                        in the clinic, holding her paw, tears streaming down my face, as the doctor explained the
                        treatment options. It all felt overwhelming and impossible – the costs were astronomical, and we
                        didn't know how we could afford it.
                    </p>
                </li>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat">
                        Then we found Paw Quote. Their representative listened with compassion, helped us navigate the
                        paperwork, and within days, we had a treatment plan in place. Paw Quote covered the majority of
                        Bella's surgery and chemotherapy expenses, giving us the chance to focus on caring for her,
                        rather than worrying about finances.
                    </p>
                </li>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat ">
                        The first few weeks were tough. Bella was tired, her appetite was low, and there were moments
                        when I doubted whether we were doing the right thing. But every time I looked into her eyes, I
                        saw the same spark, the same determination, and I knew we had to fight.
                    </p>
                </li>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat ">
                        Slowly, Bella began to improve. She started wagging her tail again, she began eating, and her
                        playful personality returned. Every small milestone felt like a victory. Her vet team was
                        incredible, and with Paw Quote’s support, we never had to skip a treatment or compromise on her
                        care.
                    </p>
                </li>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat ">
                        A year later, Bella was declared cancer-free. I still remember the joy we felt when we got the
                        news – it was like getting our family back. Now, two years later, Bella is thriving. She loves
                        going on long walks, wrestling with her favorite stuffed bear, and greeting every visitor with a
                        happy tail wag.
                    </p>
                </li>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat ">
                        We know we couldn't have done this without Paw Quote. Their help not only saved Bella's life,
                        but it also gave us peace of mind and a renewed sense of hope when we needed it most. The
                        journey reminded us just how precious every moment with her is, and how powerful community and
                        compassion can be in the face of life’s toughest challenges.
                    </p>
                </li>
                <li>
                    <p class="c-light f-20 l-h-32 f-w-4 montserrat mb-0">
                        Today, Bella continues to inspire us. She lives every day with boundless energy, chasing
                        squirrels in the backyard, snuggling with the kids, and curling up at our feet every night. She
                        reminds us to cherish each moment, to stay resilient, and to always fight for those we love.
                    </p>
                </li>
            </ul> --}}
        </div>
    </section>
</main>
@endsection