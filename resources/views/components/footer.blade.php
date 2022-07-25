<footer class="text-center bg-footer py-2">
  
  <section class="d-flex justify-content-center justify-content-lg-between p-2">
    
    <div class="container text-center text-md-start">
      <div class="row mt-3">
        
        <div class="col-md-3 col-lg-3 col-xl-2 col-xs-12 mx-auto mb-3">
          
            <h4 class="text-icewhite mb-3">{{__('ui.footerHelp')}}</h4>
            
            @auth
              @if(Auth::user()->is_revisor)
                <p><a href="{{route('revisor.index')}}" class="text-icewhite">{{__('ui.revisorZone')}}</a></p>
              @else
                <p><a href="{{route('become.revisor')}}" class="text-icewhite">{{__('ui.becomeRevisor')}}</a></p>
              @endif
              @else
                <p><a href="{{Route('register')}}" class="text-icewhite">{{__('ui.register')}}</a></p>
            @endauth
            <p class="text-icewhite"><a href="" data-bs-toggle="modal" data-bs-target="#ModalContattaci" class="text-icewhite">{{__('ui.contactUs')}}</a></p>
            {{-- <p class="text-icewhite">Registrati </p> --}}

            <p class="text-icewhite"> <a href="" data-bs-toggle="modal" data-bs-target="#ModalTermofUse" class="text-icewhite">{{__('ui.termsOfUse')}}</a></p>
            <p class="text-icewhite"><a href="" data-bs-toggle="modal" data-bs-target="#ModalPrivacyPolicy" class="text-icewhite">{{__('ui.privacyPolicy')}}</a></p>
            <p class="text-icewhite"><a href="" data-bs-toggle="modal" data-bs-target="#ModalOurDisclaimer" class="text-icewhite">{{__('ui.disclaimer')}}</a></p>
            {{-- <p class="text-icewhite">Cookie Policy</p> --}}
        </div>
        
         
       {{-- <div class="col-md-3 col-lg-3 col-xl-2 col-xs-12 mx-auto mb-4">
          <h4 class="text-icewhite mb-3">Legal </h4>
          <p class="text-icewhite">Terms of Use </p>
          <p class="text-icewhite">Privacy Policy </p>
          <p class="text-icewhite">Posting Policy </p>
          <p class="text-icewhite">Cookie Policy </p>
        </div> --}}
        <div class="col-md-3 col-lg-3 col-xl-2 col-xs-12 mx-auto mb-4">
          <h4 class="text-icewhite mb-3">{{__('ui.topCategories')}}</h4>
          @foreach ($categories as $category)
            @if($category['id']<= 5)
            <p><a class="text-icewhite" href="{{route('categoryShow', compact('category'))}}"><x-CategoryName :category="$category" /></a></p>
            @endif
          @endforeach
    
        </div>

        <div class="col-md-3 col-lg-3 col-xl-2 col-xs-12 mx-auto mb-4">
          <h4 class="text-icewhite mb-3">{{__('ui.explore')}}</h4>
          <p><a href="{{Route('aboutPresto')}}" class="text-icewhite">{{__('ui.teamPresto')}}</a></p>
          <p><a href="{{Route('announcements.index')}}" class="text-icewhite">{{__('ui.allAnnouncements')}}</a></p>

        </div>
        

        
      </div>
      <div class="row">
        <div class="col-md-12 d-flex flex-column justify-content-between align-items-center mb-3">
          <div class="line-diveder-footer">

          </div>
          <div class="text-icewhite text-center">
            <i class="fa-brands fa-facebook-square fa-2x ms-2"></i>
            <i class="fab fa-instagram fa-2x ms-2"></i>
            <i class="fab fa-twitter fa-2x ms-2"></i>
          </div>
          
          <div class="text-icewhite">
            <p class="text-reset text-icewhite mt-2">Copyright © 2022-2023 Presto. Srl. All Rights reserves</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</footer>

  <!-- Modal contact us-->
  <div class="modal fade modalFont" id="ModalContattaci" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content  bg-icewhite">
        <div class="modal-header">
          <h5 class="modal-title d-none" id="exampleModalLabel">{{__('ui.contactUs')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <!--Section: Contact v.2-->
            <section class="mb-4">

                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-center my-4">{{__('ui.contactUs')}}</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">{{__('ui.contactUsModalMessage')}}</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-12 col-md-12 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="{{route('contattaci.submit')}}" method="POST">
                          @csrf
                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12 my-3">
                                    <div class="md-form mb-0">
                                        <input type="text" id="contactUsName" name="contactUsName" class="form-control">
                                        <label for="contactUsName" class="">{{__('ui.yourName')}}</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-12 my-3">
                                    <div class="md-form mb-0">
                                        <input type="email" id="contactUsEmail" name="contactUsEmail" class="form-control">
                                        <label for="contactUsEmail" class="">{{__('ui.yourEmail')}}</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="contactUsSubject" name="contactUsSubject" class="form-control">
                                        <label for="contactUsSubject" class="">{{__('ui.subject')}}</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row my-3">

                                <!--Grid column-->
                                <div class="col-sm-12">

                                    <div class="md-form">
                                        <textarea type="text" id="contactUsMessage" name="contactUsMessage" rows="2" class="form-control md-textarea"></textarea>
                                        <label for="contactUsMessage">{{__('ui.yourMessage')}}</label>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->

                        </form>

                        <div class="text-center text-md-left">
                            <a class="btn btn-custom-primary" onclick="document.getElementById('contact-form').submit();">{{__('ui.send')}}</a>
                        </div>
                        <div class="status"></div>
                    </div>
                </div>

            </section>
            <!--Section: Contact v.2-->

        </div>

        
      </div>
    </div>
  </div>

  {{-- modal terms of use --}}
  <div class="modal fade" id="ModalTermofUse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('ui.termsOfUse')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          We are Presto Inc., doing business as Presto (“Presto,” “we,” “us,” or “our”), a company registered in the State of Delaware. We operate the website https://Presto.it (the “Website”) through which we provide you our services, (collectively, the “Services” which include the provision and use of the Website).
          You can contact us by phone at (855) 234-5020, by email at info@Presto.io, or by post to Presto Inc., 8 The Grn Ste B, Dover, DE 19901.
          These Terms of Use constitute a legally binding agreement made between you, whether personally or on behalf of an entity (“you”) and concerning your access to and use of the Website and the Services. You agree that by accessing the Services, you have read, understood, and agree to be bound by all of these Terms of Use. IF YOU DO NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SERVICES AND YOU MUST DISCONTINUE USE IMMEDIATELY.
          Supplemental terms and conditions or documents that may be posted on the Website from time to time are hereby expressly incorporated herein by reference. We reserve the right, in Presto’s sole discretion, to make changes or modifications to these Terms of Use from time to time. We will alert you about any changes by updating the “Last updated” date of these Terms of Use, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Terms of Use to stay informed as each time you access the Services, you will be subject to, and will be deemed to have been made aware of and to have accepted, the then applicable Terms of Use.
          The Services are intended for business users who are at least 18 years old. Persons under the age of 18 are not permitted to use or register for the Services.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.close')}}</button>
        </div>
      </div>
    </div>
  </div>


  {{-- modal Privacy policy --}}
  <div class="modal fade" id="ModalPrivacyPolicy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('ui.privacyPolicy')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Last updated May 27, 2021
          Thank you for choosing to be part of our community at Presto Inc., doing business as Presto (“Presto“, “we“, “us“, “our“). We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about this privacy notice, or our practices with regards to your personal information, please contact us at support@Presto.io.
          When you visit our website https://Presto.it/ (the “Website“), and more generally, use any of our services (the “Services“, which include the Website), we appreciate that you are trusting us with your personal information. We take your privacy very seriously. In this privacy notice, we seek to explain to you in the clearest way possible what information we collect, how we use it and what rights you have in relation to it. We hope you take some time to read through it carefully, as it is important. If there are any terms in this privacy notice that you do not agree with, please discontinue use of our Services immediately.
          This privacy notice applies to all information collected through our Services (which, as described above, includes our Website), as well as, any related services, sales, marketing or events.
          Please read this privacy notice carefully as it will help you understand what we do with the information that we collect.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.close')}}</button>
        </div>
      </div>
    </div>
  </div>


  {{-- modal Our Disclaimer --}}
  <div class="modal fade" id="ModalOurDisclaimer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('ui.disclaimer')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Presto’s Disclaimer
          Last updated July 04, 2017
          WEBSITE DISCLAIMER
          The information provided by Presto.io (“we,” “us” or “our”) on https://Presto.it (the “Site”) is for general informational purposes only. All information on the Site is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability or completeness of any information on the Site. UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.
          EXTERNAL LINKS DISCLAIMER
          The Site may contain or you may be sent through the Site links to other websites or content belonging to or originating from third parties or links to websites and features in banners or other advertising. Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability or completeness by us. WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR THE ACCURACY OR RELIABILITY OF ANY INFORMATION OFFERED BY THIRD-PARTY WEBSITES LINKED THROUGH THE SITE OR ANY WEBSITE OR FEATURE LINKED IN ANY BANNER OR OTHER ADVERTISING. WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES.
          PROFESSIONAL DISCLAIMER
          The Site cannot and does not contain legal advice. The legal information is provided for general informational and educational purposes only and is not a substitute for professional advice. Accordingly, before taking any actions based upon such information, we encourage you to consult with the appropriate professionals. We do not provide any kind of legal advice. THE USE OR RELIANCE OF ANY INFORMATION CONTAINED ON THIS SITE IS SOLELY AT YOUR OWN RISK.
          TESTIMONIALS DISCLAIMER
          The Site may contain testimonials by users of our products and/or services. These testimonials reflect the real-life experiences and opinions of such users. However, the experiences are personal to those particular users, and may not necessarily be representative of all users of our products and/or services. We do not claim, and you should not assume, that all users will have the same experiences. YOUR INDIVIDUAL RESULTS MAY VARY.
          The testimonials on the Site are submitted in various forms such as text, audio and/or video, and are reviewed by us before being posted. They appear on the Site verbatim as given by the users, except for the correction of grammar or typing errors. Some testimonials may have been shortened for the sake of brevity where the full testimonial contained extraneous information not relevant to the general public.
          The views and opinions contained in the testimonials belong solely to the individual user and do not reflect our views and opinions. We are not affiliated with users who provide testimonials, and users are not paid or otherwise compensated for their testimonials.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.close')}}</button>
        </div>
      </div>
    </div>
  </div>