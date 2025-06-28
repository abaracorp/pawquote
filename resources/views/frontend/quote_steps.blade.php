@extends('frontend.master')

@section('content')
    <main id="get-quote-step">
        <section class="banner">

            <div class="hero ">
                <div class="container">
                    <!-- Progress Bar -->
                    <div class="progress mb-3" role="progressbar">
                        <div class="progress-bar" id="progressBar" style="width: 17%"></div>
                    </div>

                    <!-- Step Indicator -->
                    <div class="step-indicator d-flex align-items-center justify-content-between mb-4">
                        <p>Step <span id="stepNumber">1</span> of 6</p>
                        <p><span id="stepPercent">17</span>% Complete</p>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="step1">

                            <div class="card-container dog-cat">
                                <div class="heading">
                                    <h2 class="f-32 c-dark f-w-6 l-h-38 freedoka">Would you like a dog or cat quote?</h2>
                                    <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select the type of pet you want to
                                        insure.
                                    </p>
                                </div>
                                <div class="choose-content">
                                    <div
                                        class="pet-card b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M31.88 9.98571C17.335 9.61071 12.625 20.8707 12.265 25.0957C11.985 28.3807 10.575 40.3957 17.425 48.4657C20.96 52.6307 26.625 54.7057 32.63 54.5657C38.685 54.4257 44.155 53.2207 47.835 48.3707C54.03 40.2057 53.37 28.0057 52.53 24.0607C51.74 20.3907 48.675 10.4157 31.88 9.98571Z"
                                                fill="#FEA145" />
                                            <path
                                                d="M48.4098 32.2157C48.9248 36.1207 47.2298 39.8457 42.7648 40.1107C38.6798 40.3557 36.1598 37.7507 35.9598 33.9157C35.7548 29.9857 37.9048 26.3307 41.3198 25.9557C44.9248 25.5607 47.8998 28.3107 48.4098 32.2157Z"
                                                fill="white" />
                                            <path
                                                d="M9.45057 13.3603C9.45057 13.3603 4.53557 15.2853 3.35057 18.1453C1.75557 21.9953 2.49057 29.6353 3.35057 32.6003C4.19557 35.5103 6.44557 38.5153 9.92057 38.4203C13.3956 38.3253 16.4456 34.8053 17.5206 30.2103C18.6006 25.6103 18.8356 17.7303 19.1606 16.3203C19.4856 14.9103 20.0506 13.7853 20.0506 13.7853C20.0506 13.7853 15.7356 9.60533 9.45057 13.3603ZM50.6056 12.7503C50.6056 12.7503 57.2706 12.9853 58.8656 13.6903C60.4606 14.3953 61.9156 17.5853 61.7756 21.8553C61.6356 26.1253 61.3556 33.0303 59.1956 35.4153C57.4106 37.3853 53.8006 37.5253 51.7806 35.0853C49.7606 32.6453 48.4956 28.5153 48.0256 25.8403C47.5556 23.1653 46.7606 19.6953 46.2406 18.1453C45.7256 16.5953 44.4556 13.5003 43.8006 12.7953C43.1406 12.0953 44.4556 11.4353 50.6056 12.7503Z"
                                                fill="#FFE5CC" />
                                            <path
                                                d="M14.9847 11.1555C11.3697 10.9255 5.40972 13.7855 4.18972 16.7405C2.96972 19.6955 3.68472 29.2855 4.70972 32.0855C5.78972 35.0405 8.03972 38.7505 11.9347 35.5605C15.8297 32.3705 16.8597 24.3455 17.2397 21.7655C17.6147 19.1855 18.1297 16.0405 18.6947 15.3855C19.2597 14.7305 20.0547 13.7905 20.0547 13.7905C20.0547 13.7905 19.4447 11.4355 14.9847 11.1555ZM51.3997 10.5455C54.7947 10.7805 58.4847 12.0455 59.8447 15.0055C61.2047 17.9605 60.6897 24.9555 60.1747 28.2855C59.6597 31.6155 58.4397 35.0905 55.3897 34.7155C52.3397 34.3405 50.7897 30.2105 49.8547 26.3155C48.9147 22.4205 47.9297 18.5255 46.7097 15.7105C45.9747 14.0105 43.4247 12.7555 43.4247 12.7555C43.4247 12.7555 44.5497 10.0755 51.3997 10.5455Z"
                                                fill="#FEA145" />
                                            <path
                                                d="M25.2495 33.8442C25.0495 35.5542 24.1695 36.9342 22.2595 36.7342C20.9045 36.5892 19.9945 34.9742 20.1945 33.2592C20.3945 31.5492 20.9895 30.3192 22.5895 30.3492C25.0745 30.3942 25.4495 32.1292 25.2495 33.8442ZM44.8695 33.3642C44.9495 35.0842 44.2695 36.5542 42.2845 36.6992C40.5595 36.8242 39.6745 35.3292 39.5995 33.6092C39.5195 31.8892 40.3745 30.5092 42.0195 30.3042C44.1545 30.0292 44.7895 31.6442 44.8695 33.3642ZM37.5595 42.0342C37.6395 43.7542 36.4795 45.3642 32.8645 45.3192C29.3445 45.2742 28.0645 43.8492 27.9845 42.1292C27.9045 40.4092 29.9045 38.8642 32.7695 38.7992C36.7145 38.6992 37.4795 40.3092 37.5595 42.0342Z"
                                                fill="black" />
                                            <path
                                                d="M29.5801 48.9793C29.5801 48.9793 30.0051 53.0643 30.4251 54.2843C31.3151 56.8643 35.0651 56.4343 35.7301 54.0043C36.2951 51.9393 35.9201 48.3743 35.9201 48.3743L32.5901 47.9043L29.5801 48.9793Z"
                                                fill="#E94B8C" />
                                            <path
                                                d="M32.9801 50.3403C32.3951 50.3653 32.4151 50.9053 32.4151 52.1453C32.4151 53.3903 32.4851 54.1403 33.0501 54.1153C33.6151 54.0903 33.5451 53.1303 33.5451 52.2403C33.5451 51.3503 33.5901 50.3153 32.9801 50.3403Z"
                                                fill="#EF87B2" />
                                            <path
                                                d="M25.0746 45.1044C24.3996 46.0994 25.7096 46.9794 26.7896 47.7094C27.8696 48.4344 29.1796 49.5394 30.7296 49.5144C32.4646 49.4894 32.9346 48.3194 32.9346 48.3194C32.9346 48.3194 33.4996 49.7044 35.9596 49.4444C37.2746 49.3044 38.8946 47.8294 39.3846 47.4994C40.3246 46.8644 41.4496 46.0694 40.9546 45.4094C40.3896 44.6544 39.1946 45.6694 37.9746 46.2994C36.7546 46.9344 36.3346 47.2394 35.4196 47.2394C34.5046 47.2394 33.8696 46.8644 33.8246 45.3394C33.7846 44.0944 33.7996 43.8594 33.7996 43.8594H31.7096C31.7096 43.8594 31.7796 45.1744 31.7796 45.5494C31.7796 46.5344 31.2646 46.9594 30.2796 47.0044C29.2946 47.0494 28.2396 46.2294 27.7196 45.9244C27.2096 45.6244 25.6146 44.3094 25.0746 45.1044Z"
                                                fill="black" />
                                        </svg>
                                        <label class="radio-container">Dog <input type="radio" id="radioDog"
                                                name="petType" value="dog"> <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div
                                        class="pet-card  b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M57.3352 35.0954C56.3552 22.1104 47.2202 13.1504 32.0002 13.1504C16.7802 13.1504 7.62522 22.6654 6.72522 35.6554C6.20022 43.2254 9.01522 49.9704 14.6802 53.8154C18.4102 56.3504 23.6202 57.7554 32.0652 57.7554C40.6552 57.7554 45.5802 55.9004 49.3102 53.3904C55.5252 49.2154 57.9002 42.5554 57.3352 35.0954Z"
                                                fill="#FEA145" />
                                            <path
                                                d="M26.8602 21.2998C23.1502 11.6998 15.0502 5.16982 11.9352 4.19482C10.7602 3.82482 9.28519 3.78982 8.62019 4.86982C6.94019 7.59482 4.79019 16.3448 9.54519 28.7598L26.8602 21.2998Z"
                                                fill="#FEA145" />
                                            <path
                                                d="M18.0605 17.1052C18.8305 16.4602 19.2055 15.8302 18.3605 14.5252C17.0505 12.5002 14.6955 10.1352 13.7805 9.41025C12.2805 8.22025 11.1205 7.82025 10.6755 9.73525C9.85045 13.2752 9.91545 18.0802 10.8005 20.7302C11.1105 21.6652 12.0705 22.1602 12.8105 21.5152L18.0605 17.1052Z"
                                                fill="white" />
                                            <path
                                                d="M27.0602 22.5103C27.6252 22.9903 28.7702 22.9203 29.4352 22.1503C30.2402 21.2153 31.0802 18.0653 30.5552 13.1953C28.2202 13.2803 26.0102 13.6153 23.9502 14.1803C25.6152 16.9103 26.0152 21.6203 27.0602 22.5103ZM36.9402 22.5103C36.3752 22.9903 35.2302 22.9203 34.5652 22.1503C33.7602 21.2153 32.9202 18.0653 33.4452 13.1953C35.7802 13.2803 37.9902 13.6153 40.0502 14.1803C38.3852 16.9103 37.9852 21.6203 36.9402 22.5103Z"
                                                fill="#FFE5CC" />
                                            <path
                                                d="M39.9502 14.6101C43.9902 8.40514 49.6402 4.23514 51.9852 3.49014C53.1452 3.12014 54.4952 3.18014 55.1552 4.26514C56.8152 6.99014 58.2202 15.3851 54.9452 27.1401L42.9802 21.3701L39.9502 14.6101Z"
                                                fill="#FEA145" />
                                            <path
                                                d="M48.7746 19.1145C49.9896 20.3295 50.9796 21.1445 51.6946 21.9195C52.1696 22.4345 53.0396 22.1995 53.1796 21.5095C54.4046 15.6095 54.0146 10.5795 53.1796 9.25948C52.7796 8.62948 52.0346 8.46448 51.3546 8.69448C50.1346 9.09948 47.0246 11.4195 44.8296 14.8045C44.5746 15.1995 44.6696 15.7295 45.0596 15.9945C45.8496 16.5295 47.2296 17.5645 48.7746 19.1145Z"
                                                fill="white" />
                                            <path
                                                d="M27.8352 38.8757C27.8102 37.3357 30.0202 36.6007 32.1052 36.5657C34.1952 36.5307 36.4452 37.2107 36.4702 38.7507C36.4952 40.2907 33.8602 42.3157 32.2002 42.3157C30.5452 42.3157 27.8652 40.4107 27.8352 38.8757Z"
                                                fill="black" />
                                            <path
                                                d="M3.3502 35.5159C3.5202 35.7209 5.5552 35.6909 10.5302 38.0509M1.4502 41.4309C1.4502 41.4309 4.6602 40.3109 10.1802 41.2909M4.4052 46.1459C4.4052 46.1459 5.7752 45.4559 10.7402 45.0209M60.4352 33.7559C60.4352 33.7559 58.7302 33.9209 53.4652 36.9259M61.2102 39.2459C61.2102 39.2459 58.6652 39.0659 53.1852 40.2309M60.2252 44.5259C60.2252 44.5259 57.8102 43.6709 52.8352 43.4009"
                                                stroke="#000200" stroke-width="0.375" stroke-miterlimit="10"
                                                stroke-linecap="round" />
                                            <path
                                                d="M48.0454 33.185C47.8754 35.94 46.1654 37.455 44.2204 37.455C42.2754 37.455 40.7004 35.515 40.7004 33.125C40.7004 30.735 42.3404 28.77 44.5254 28.89C47.0604 29.035 48.1854 30.935 48.0454 33.185ZM23.0004 32.905C23.3904 35.71 22.2104 37.42 20.2554 37.815C18.3004 38.21 16.6254 36.895 16.1404 34.495C15.6504 32.09 16.5904 29.835 18.8104 29.51C21.3854 29.135 22.6804 30.61 23.0004 32.905Z"
                                                fill="#000200" />
                                            <path
                                                d="M22.4952 42.5808C21.2102 43.4158 22.7302 45.3508 23.6202 46.0058C24.5102 46.6608 26.1102 47.4658 28.4552 47.2258C31.2252 46.9458 32.0202 44.8808 32.0202 44.8808C32.0202 44.8808 33.0052 47.1808 36.4302 47.2758C39.9052 47.3708 40.9802 45.4908 41.4502 44.9308C41.9202 44.3658 42.3902 42.9108 41.5902 42.3508C40.7902 41.7858 40.2302 42.4908 39.3852 43.6658C38.5402 44.8408 36.8052 45.4958 35.1152 44.6958C33.4252 43.8958 33.3302 41.1758 33.3302 41.1758L30.9352 41.3158C30.9352 41.3158 30.5602 43.6608 29.4802 44.4108C28.4002 45.1608 25.8202 45.3508 24.7402 43.7058C24.2652 42.9758 23.5752 41.8758 22.4952 42.5808Z"
                                                fill="black" />
                                        </svg>
                                        <label class="radio-container">Cat <input type="radio" id="radioCat"
                                                name="petType" value="cat"> <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
                                    <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat"><svg width="24"
                                            height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.66667 11.3333L4 8.66667L6.66667 11.3333ZM4 8.66667L6.66667 6L4 8.66667ZM4 8.66667H12H4Z"
                                                fill="#566369" />
                                            <path d="M6.66667 11.3333L4 8.66667M4 8.66667L6.66667 6M4 8.66667H12"
                                                stroke="#566369" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Back</button>
                                    <button onclick="changeStep(1)" class="next f-14 f-w-5 montserrat">Next<svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.33333 11.3333L12 8.66667L9.33333 11.3333ZM12 8.66667L9.33333 6L12 8.66667ZM12 8.66667H4H12Z"
                                                fill="#002133" />
                                            <path d="M9.33333 11.3333L12 8.66667M12 8.66667L9.33333 6M12 8.66667H4"
                                                stroke="#002133" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="step2">

                            <div class="card-container">
                                <div class="heading">
                                    <h2 class="f-32 c-dark f-w-6 l-h-38 freedoka">What's your dog's name?</h2>
                                    <p class="f-20 c-light f-w-4 l-h-38 montserrat">SLet us know what to call your furry
                                        friend.
                                    </p>
                                </div>
                                <form action="">
                                    <div class="form-group">
                                        <label for="pet-name" class="f-18 c-dark f-w-4 freedoka">Pet Name</label>
                                        <input type="text" name="" class="br-12" id="pet-name"
                                            placeholder="Your pet’s name..." required>
                                    </div>
                                    <label class="check-container ">I don't have my pet yet
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </form>
                                <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
                                    <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat"><svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.66667 11.3333L4 8.66667L6.66667 11.3333ZM4 8.66667L6.66667 6L4 8.66667ZM4 8.66667H12H4Z"
                                                fill="#566369" />
                                            <path d="M6.66667 11.3333L4 8.66667M4 8.66667L6.66667 6M4 8.66667H12"
                                                stroke="#566369" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Back</button>
                                    <button onclick="changeStep(1)" class="next f-14 f-w-5 montserrat">Next<svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.33333 11.3333L12 8.66667L9.33333 11.3333ZM12 8.66667L9.33333 6L12 8.66667ZM12 8.66667H4H12Z"
                                                fill="#002133" />
                                            <path d="M9.33333 11.3333L12 8.66667M12 8.66667L9.33333 6M12 8.66667H4"
                                                stroke="#002133" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="step3">

                            <div class="card-container">
                                <div class="heading">
                                    <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What breed of dog is your pet?</h2>
                                    <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your pet's breed from the list.
                                    </p>
                                </div>
                                <form action="">
                                    <div class="custom-select-wrapper">
                                        <select class="custom-select c-dark f-16 f-w-4 freedoka">
                                            <option class="c-light f-16 f-w-4 freedoka">Rottweiler</option>
                                            <option class="c-light f-16 f-w-4 freedoka">Doberman Pinscher</option>
                                            <option class="c-light f-16 f-w-4 freedoka">Boxer</option>
                                            <option class="c-light f-16 f-w-4 freedoka">Siberian Husky</option>
                                            <option class="c-light f-16 f-w-4 freedoka">Alaskan Malamute</option>
                                        </select>
                                    </div>
                                </form>

                                <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
                                    <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat"><svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.66667 11.3333L4 8.66667L6.66667 11.3333ZM4 8.66667L6.66667 6L4 8.66667ZM4 8.66667H12H4Z"
                                                fill="#566369" />
                                            <path d="M6.66667 11.3333L4 8.66667M4 8.66667L6.66667 6M4 8.66667H12"
                                                stroke="#566369" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Back</button>
                                    <button onclick="changeStep(1)" class="next f-14 f-w-5 montserrat">Next<svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.33333 11.3333L12 8.66667L9.33333 11.3333ZM12 8.66667L9.33333 6L12 8.66667ZM12 8.66667H4H12Z"
                                                fill="#002133" />
                                            <path d="M9.33333 11.3333L12 8.66667M12 8.66667L9.33333 6M12 8.66667H4"
                                                stroke="#002133" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="step4">

                            <div class="card-container gender">
                                <div class="heading">
                                    <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What is the gender of your pet?</h2>
                                    <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your pet's gender.
                                    </p>
                                </div>
                                <div class="card-pet b-blue-2 br-16">
                                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.9174 7.36566C11.9177 7.10785 8.67961 14.8491 8.43211 17.7538C8.23961 20.0122 7.27024 28.2725 11.9796 33.8207C14.4099 36.6841 18.3046 38.1107 22.4331 38.0144C26.5959 37.9182 30.3565 37.0897 32.8865 33.7554C37.1455 28.1419 36.6918 19.7544 36.1143 17.0422C35.5712 14.5191 33.464 7.66129 21.9174 7.36566Z"
                                            fill="#FEA145" />
                                        <path
                                            d="M33.2815 22.648C33.6356 25.3327 32.4703 27.8937 29.4006 28.0759C26.5922 28.2443 24.8597 26.4534 24.7222 23.8168C24.5812 21.1149 26.0593 18.6021 28.4072 18.3443C30.8856 18.0727 32.9309 19.9634 33.2815 22.648Z"
                                            fill="white" />
                                        <path
                                            d="M6.49653 9.68559C6.49653 9.68559 3.11747 11.009 2.30278 12.9753C1.20622 15.6222 1.71153 20.8747 2.30278 22.9131C2.88372 24.9137 4.4306 26.9797 6.81966 26.9143C9.20872 26.849 11.3056 24.429 12.0447 21.27C12.7872 18.1075 12.9487 12.69 13.1722 11.7206C13.3956 10.7512 13.784 9.97778 13.784 9.97778C13.784 9.97778 10.8175 7.10403 6.49653 9.68559ZM34.7906 9.26622C34.7906 9.26622 39.3728 9.42778 40.4693 9.91247C41.5659 10.3972 42.5662 12.5903 42.47 15.5259C42.3737 18.4615 42.1812 23.2087 40.6962 24.8484C39.469 26.2028 36.9872 26.299 35.5984 24.6215C34.2097 22.944 33.34 20.1047 33.0168 18.2656C32.6937 16.4265 32.1472 14.0409 31.7897 12.9753C31.4356 11.9097 30.5625 9.78184 30.1122 9.29716C29.6584 8.81591 30.5625 8.36216 34.7906 9.26622Z"
                                            fill="#FFE5CC" />
                                        <path
                                            d="M10.3023 8.16834C7.81699 8.01021 3.71949 9.97646 2.88074 12.008C2.04199 14.0396 2.53355 20.6327 3.23824 22.5577C3.98074 24.5893 5.52761 27.1399 8.20543 24.9468C10.8832 22.7537 11.5914 17.2365 11.8526 15.4627C12.1104 13.689 12.4645 11.5268 12.8529 11.0765C13.2414 10.6261 13.7879 9.9799 13.7879 9.9799C13.7879 9.9799 13.3686 8.36084 10.3023 8.16834ZM35.3376 7.74896C37.6717 7.91052 40.2086 8.78021 41.1436 10.8152C42.0786 12.8468 41.7245 17.6558 41.3704 19.9452C41.0164 22.2346 40.1776 24.6236 38.0807 24.3658C35.9839 24.108 34.9182 21.2687 34.2754 18.5908C33.6292 15.913 32.952 13.2352 32.1132 11.2999C31.6079 10.1311 29.8548 9.26834 29.8548 9.26834C29.8548 9.26834 30.6282 7.42584 35.3376 7.74896Z"
                                            fill="#FEA145" />
                                        <path
                                            d="M17.3595 23.7693C17.222 24.945 16.617 25.8937 15.3039 25.7562C14.3723 25.6565 13.7467 24.5462 13.8842 23.3671C14.0217 22.1915 14.4307 21.3459 15.5307 21.3665C17.2392 21.3975 17.497 22.5903 17.3595 23.7693ZM30.8482 23.4393C30.9032 24.6218 30.4357 25.6325 29.071 25.7321C27.8851 25.8181 27.2767 24.7903 27.2251 23.6078C27.1701 22.4253 27.7579 21.4765 28.8889 21.3356C30.3567 21.1465 30.7932 22.2568 30.8482 23.4393ZM25.8226 29.4C25.8776 30.5825 25.0801 31.6893 22.5948 31.6584C20.1748 31.6275 19.2948 30.6478 19.2398 29.4653C19.1848 28.2828 20.5598 27.2206 22.5295 27.1759C25.2417 27.1071 25.7676 28.214 25.8226 29.4Z"
                                            fill="black" />
                                        <path
                                            d="M20.3359 34.1746C20.3359 34.1746 20.6281 36.983 20.9169 37.8218C21.5287 39.5955 24.1069 39.2999 24.5641 37.6293C24.9525 36.2096 24.6947 33.7587 24.6947 33.7587L22.4053 33.4355L20.3359 34.1746Z"
                                            fill="#E94B8C" />
                                        <path
                                            d="M22.6736 35.1097C22.2715 35.1269 22.2852 35.4981 22.2852 36.3506C22.2852 37.2066 22.3333 37.7222 22.7218 37.705C23.1102 37.6878 23.0621 37.0278 23.0621 36.4159C23.0621 35.8041 23.093 35.0925 22.6736 35.1097Z"
                                            fill="#EF87B2" />
                                        <path
                                            d="M17.2395 31.5102C16.7754 32.1943 17.676 32.7993 18.4185 33.3012C19.161 33.7996 20.0617 34.5593 21.1273 34.5421C22.3201 34.5249 22.6432 33.7205 22.6432 33.7205C22.6432 33.7205 23.0317 34.6727 24.7229 34.494C25.627 34.3977 26.7407 33.3837 27.0776 33.1568C27.7238 32.7202 28.4973 32.1737 28.157 31.7199C27.7685 31.2009 26.947 31.8987 26.1082 32.3318C25.2695 32.7684 24.9807 32.978 24.3517 32.978C23.7226 32.978 23.286 32.7202 23.2551 31.6718C23.2276 30.8159 23.2379 30.6543 23.2379 30.6543H21.801C21.801 30.6543 21.8492 31.5584 21.8492 31.8162C21.8492 32.4934 21.4951 32.7855 20.8179 32.8165C20.1407 32.8474 19.4154 32.2837 19.0579 32.074C18.7073 31.8677 17.6107 30.9637 17.2395 31.5102Z"
                                            fill="black" />
                                    </svg>
                                    <span class="c-light f-16 f-w-4 freedoka">Dog</span>
                                </div>
                                <div class="choose-gender-card d-flex gap-3">
                                    <div
                                        class="pet-card pet-card4  b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
                                        <label class="radio-container">Dog <input type="radio" id="radioDog"
                                                name="petType" value="dog"> <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div
                                        class="pet-card pet-card4 b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
                                        <label class="radio-container">Cat <input type="radio" id="radioCat"
                                                name="petType" value="cat"> <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
                                    <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat"><svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.66667 11.3333L4 8.66667L6.66667 11.3333ZM4 8.66667L6.66667 6L4 8.66667ZM4 8.66667H12H4Z"
                                                fill="#566369" />
                                            <path d="M6.66667 11.3333L4 8.66667M4 8.66667L6.66667 6M4 8.66667H12"
                                                stroke="#566369" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Back</button>
                                    <button onclick="changeStep(1)" class="next f-14 f-w-5 montserrat">Next<svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.33333 11.3333L12 8.66667L9.33333 11.3333ZM12 8.66667L9.33333 6L12 8.66667ZM12 8.66667H4H12Z"
                                                fill="#002133" />
                                            <path d="M9.33333 11.3333L12 8.66667M12 8.66667L9.33333 6M12 8.66667H4"
                                                stroke="#002133" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="step5">

                            <div class="card-container">
                                <div class="heading">
                                    <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What's your dog's age?</h2>
                                    <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your pet's age.
                                    </p>
                                </div>

                                <form action="">
                                    <div class="form-group">
                                        <label for="">Pet Age</label>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="custom-select-wrapper">
                                                    <select name=""
                                                        id=""class="c-dark f-16 f-w-4 freedoka">
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">0 Years
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">1 Years
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">2 Years
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">3 Years
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">4 Years
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                <div class="custom-select-wrapper mb-0">
                                                    <select name=""
                                                        id=""class="c-dark f-16 f-w-4 freedoka">
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">0 Months
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">1 Months
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">2 Months
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">3 Months
                                                        </option>
                                                        <option value=""class="c-light f-16 f-w-4 freedoka">4 Months
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
                                    <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat"><svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.66667 11.3333L4 8.66667L6.66667 11.3333ZM4 8.66667L6.66667 6L4 8.66667ZM4 8.66667H12H4Z"
                                                fill="#566369" />
                                            <path d="M6.66667 11.3333L4 8.66667M4 8.66667L6.66667 6M4 8.66667H12"
                                                stroke="#566369" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Back</button>
                                    <button onclick="changeStep(1)" class="next f-14 f-w-5 montserrat">Next<svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.33333 11.3333L12 8.66667L9.33333 11.3333ZM12 8.66667L9.33333 6L12 8.66667ZM12 8.66667H4H12Z"
                                                fill="#002133" />
                                            <path d="M9.33333 11.3333L12 8.66667M12 8.66667L9.33333 6M12 8.66667H4"
                                                stroke="#002133" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="step6">

                            <div class="card-container">
                                <div class="heading">
                                    <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">Let Us Know How to Reach You</h2>
                                    <p class="f-20 c-light f-w-4 l-h-38 montserrat">We'll send your quotes to this email
                                        address.
                                    </p>
                                </div>

                                <form action="">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="" id="email"
                                            placeholder="Your Email Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number (Optional)</label>
                                        <input type="text" class="" id="phone"
                                            placeholder="Your Phone Number (optional)">
                                        <p class="c-light f-12 montserrat mb-0">Providing your phone number allows us to
                                            send you important updates via call or SMS.</p>
                                    </div>
                                </form>
                                <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
                                    <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat"><svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.66667 11.3333L4 8.66667L6.66667 11.3333ZM4 8.66667L6.66667 6L4 8.66667ZM4 8.66667H12H4Z"
                                                fill="#566369" />
                                            <path d="M6.66667 11.3333L4 8.66667M4 8.66667L6.66667 6M4 8.66667H12"
                                                stroke="#566369" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Back</button>

                                    <button type="button"  onclick="changeStep(1)" class="next f-14 f-w-5 montserrat"><a href="{{route('results')}}">See Results</a><svg
                                            width="24" height="24" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.33333 11.3333L12 8.66667L9.33333 11.3333ZM12 8.66667L9.33333 6L12 8.66667ZM12 8.66667H4H12Z"
                                                fill="#002133" />
                                            <path d="M9.33333 11.3333L12 8.66667M12 8.66667L9.33333 6M12 8.66667H4"
                                                stroke="#002133" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button> 
                                </div>
                            </div>

                        </div>
                    </div>

                   
                </div>
            </div>

        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const petCards = document.querySelectorAll('.pet-card'); 

            petCards.forEach(card => {
                const radioInput = card.querySelector(
                    'input[type="radio"]'); 

                
                card.addEventListener('click', () => {
                   
                    petCards.forEach(otherCard => {
                        otherCard.classList.remove('selected'); 
                        const otherRadio = otherCard.querySelector('input[type="radio"]');
                        if (otherRadio && otherRadio !==
                            radioInput) { 
                            otherRadio.checked = false;
                        }
                    });

                    
                    card.classList.add('selected'); 
                    if (radioInput) {
                        radioInput.checked = true; 
                    }
                });

                
                if (radioInput && radioInput.checked) {
                    card.classList.add('selected');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const petCards = document.querySelectorAll('.pet-card4');
            petCards.forEach(card => {
                const radioInput = card.querySelector('input[type="radio"]');
                card.addEventListener('click', () => {
                    petCards.forEach(otherCard => {
                        otherCard.classList.remove('selected');
                        const otherRadio = otherCard.querySelector('input[type="radio"]');
                        if (otherRadio && otherRadio !== radioInput) {
                            otherRadio.checked = false;
                        }
                    });
                    card.classList.add('selected');
                    if (radioInput) {
                        radioInput.checked = true;
                    }
                });
                if (radioInput && radioInput.checked) {
                    card.classList.add('selected');
                }
            });
        });
    </script>

    <script>
        let currentStep = 1;
        const totalSteps = 6;

        function showStep(step) {
            document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('show', 'active'));
            document.querySelector(`#step${step}`).classList.add('show', 'active');

            document.getElementById('stepNumber').textContent = step;
            document.getElementById('stepPercent').textContent = Math.round((step / totalSteps) * 100);
            document.querySelector('.progress-bar').style.width = `${Math.round((step / totalSteps) * 100)}%`;

            // Hide/show navigation buttons
            document.querySelector('.back').style.display = (step === 1) ? 'none' : 'inline-flex';
            document.querySelector('.next').style.display = (step === totalSteps) ? 'none' : 'inline-flex';

            // Optional: hide header if step doesn't require it
            const header = document.querySelector('.heading');
            header.style.display = (step === 1) ? 'block' : 'none'; // example: only show header on step 1
        }

        function changeStep(direction) {
            currentStep += direction;
            if (currentStep < 1) currentStep = 1;
            if (currentStep > totalSteps) currentStep = totalSteps;
            showStep(currentStep);
        }

        // Initial render
        document.addEventListener('DOMContentLoaded', () => {
            showStep(currentStep);
        });
    </script>
@endsection
