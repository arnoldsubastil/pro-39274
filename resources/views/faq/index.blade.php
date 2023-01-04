
          <div>FAQ</div>
          @foreach($faqs as $faq)
            <div>
                <div class="FaqQuestion">
                    {{ $faq->question }}
                </div>
                <div class="FaqAnswer">
                    {{ $faq->answer }}
                </div>
            </div>
          @endforeach