<!-- Quick bar -->
<aside id="ms-quick-bar" class="ms-quick-bar fixed ms-d-block-lg">

  <ul class="nav nav-tabs ms-quick-bar-list" role="tablist">

    <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Settings" data-title="Settings">
      <a href="#qa-settings" aria-controls="qa-settings" role="tab" data-toggle="tab">
        <i class="flaticon-gear"></i>
      </a>
    </li>
  
  </ul>

  <div class="ms-configure-qa" data-toggle="tooltip" data-placement="left" title="Configure Quick Access">

    <a href="#">
      <i class="flaticon-hammer"></i>
    </a>

  </div>

  <!-- Quick bar Content -->
  <div class="ms-quick-bar-content">

    <div class="ms-quick-bar-header clearfix">
      <h5 class="ms-quick-bar-title float-left">Title</h5>
      <button type="button" class="close ms-toggler" data-target="#ms-quick-bar" data-toggle="hideQuickBar" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>

    <div class="ms-quick-bar-body tab-content">

      <div role="tabpanel" class="tab-pane" id="qa-settings">

        <div class="ms-quickbar-container text-center ms-invite-member">
          <div class="row">
            <div class="col-md-12 text-left mb-5">
              <h4 class="section-title bold">Customize</h4>
              <div>
                <label class="ms-switch">
                  <input type="checkbox" id="dark-mode">
                  <span class="ms-switch-slider round"></span>
                </label>
                <span> Dark Mode </span>
              </div>
              <div>
                <label class="ms-switch">
                  <input type="checkbox" id="remove-quickbar">
                  <span class="ms-switch-slider round"></span>
                </label>
                <span> Remove Quickbar </span>
              </div>
            </div>
            <div class="col-md-12 text-left">
              <h4 class="section-title bold">Keyboard Shortcuts</h4>
              <p class="ms-directions mb-0"><code>Esc</code> Close Quick Bar</p>
              <p class="ms-directions mb-0"><code>Alt + (1 -&gt; 6)</code> Open Quick Bar Tab</p>
              <p class="ms-directions mb-0"><code>Alt + Q</code> Enable Quick Bar Configure Mode</p>

            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</aside>
