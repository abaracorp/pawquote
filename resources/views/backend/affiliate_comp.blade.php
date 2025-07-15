<div class="row">
    @forelse ($affiliates as $affilate)
        <div class="col-lg-4">
            <div class="card">
                <ul class="user-detail">
                    <h3 class="f-22 c-dark f-w-5 freedoka">User details</h3>
                    <li>
                        <p class="f-18 c-dark f-w-4 freedoka">Zip code</p>
                        <p class="f-18 c-dark f-w-4 freedoka">{{ $affilate->zip_code ?? '' }}</p>
                    </li>
                    <li>
                        <p class="f-18 c-dark f-w-4 freedoka">Email address</p>
                        <p class="f-18 c-dark f-w-4 freedoka">{{ $affilate->email_address ?? '' }}</p>
                    </li>
                    <li>
                        <p class="f-18 c-dark f-w-4 freedoka">Phone number </p>
                        <p class="f-18 c-dark f-w-4 freedoka">{{ $affilate->phone_number ?? '' }}</p>
                    </li>
                    <li>
                        <p class="f-18 c-dark f-w-4 freedoka">Submit Date </p>
                        <p class="f-18 c-dark f-w-4 freedoka">
                            {{ optional($affilate->updated_at)->format('m-d-Y') ?? '' }}</p>
                    </li>
                </ul>

                @php
                    $petDetails = $affilate->getPetDetails;
                @endphp

                @if ($petDetails->count() > 0)
                   
                    @php $pet = $petDetails->first(); @endphp

                    <ul class="pet-detail">
                        <h3 class="f-22 c-dark f-w-5 freedoka">Pet details</h3>
                        <li>
                            <p class="f-18 c-dark f-w-4 freedoka">Pet</p>
                            <p class="f-18 c-dark f-w-4 freedoka">{{ $pet->pet_text ?? '' }}</p>
                        </li>
                        <li>
                            <p class="f-18 c-dark f-w-4 freedoka">Pet name</p>
                            <p class="f-18 c-dark f-w-4 freedoka">
                                {{ !empty($pet->pet_name) ? $pet->pet_name : 'No Pet Yet' }}
                            </p>
                        </li>
                        <li>
                            <p class="f-18 c-dark f-w-4 freedoka">Pet breed</p>
                            <p class="f-18 c-dark f-w-4 freedoka">
                                {{ !empty($pet->pet_breed) ? $pet->pet_breed : 'N/A' }}
                            </p>
                        </li>
                        <li>
                            <p class="f-18 c-dark f-w-4 freedoka">Gender</p>
                            <p class="f-18 c-dark f-w-4 freedoka">{{ $pet->pet_gender_text ?? '' }}</p>
                        </li>
                        <li>
                            <p class="f-18 c-dark f-w-4 freedoka">Pet age</p>
                            <p class="f-18 c-dark f-w-4 freedoka">{{ $pet->pet_age_years ?? 0 }} year {{ $pet->pet_age_months ?? 0 }} months</p>
                        </li>
                    </ul>

                    
                    @if ($petDetails->count() > 1)
                        <button type="button" class="view-more f-20 c-dark f-w-4 freedoka b-orange bg-white"
                            data-bs-toggle="modal" data-bs-target="#pet-details" 
                            onclick="viewPetDetails({{$affilate->id}})">
                            View More
                        </button>
                    @endif
                @endif

            </div>
        </div>

    @empty

        <h5>No Affiliate Found</h5>
    @endforelse
</div>
