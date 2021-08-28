
<footer class="bg-gray-200 " >
    <div class="flex flex-col items-center mx-10">
        <h3 class="heading">Lucid Ambiguity</h3>
        <ul class="flex uppercase space-x-4">
          <li>
            <a href="/"><i class="fa fa-lg fa-home"></i></a>
          </li>

          <li><a href="/about">About</a></li>
          <li><a href="/contact">Contact</a></li>

            @auth
                <a href="/dashboard"><span >Profile</span></a>
                <form action="/logout" method="POST" >
                    @csrf
                    <button type="submit" class="uppercase">Log Out</button>
                </form>
            @else
                <a href="/payment" >Payments</a>
                <a href="/login" >Login</a>
                <a href="/register" >Register</a>
            @endauth
        </ul>
        <ul class="flex uppercase space-x-4">
          <li>
            <a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a>
          </li>
          <li>
            <a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a>
          </li>
          <li>
            <a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a>
          </li>
          <li>
            <a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
          </li>
          <li>
            <a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
          </li>
          <li>
            <a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a>
          </li>
        </ul>
        <div id="copyright" class="flex flex-col items-center">
          <p>
            Copyright &copy; 2021 - All Rights Reserved -
            <a href="#">Lucid Ambiguity</a>
          </p>
          <p class="text-xs">
            Design by
            <a target="_blank" href="https://www.lucidambiguity.com/" rel="noopener" rel="noreferrer" title="Full Stack Developing">Lucid Ambiguity</a>
          </p>
        </div>
        <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->


    </div>

</footer>
    <div class="mb-3 fixed bottom-0 right-3 z-50">
      <a  id="backtotop" href="#top" ><i class="fa fa-chevron-up"></i></a>
    </div>


