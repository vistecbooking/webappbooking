function Profile(opts) {
  var options = opts;
  var elements = {
    form: $("#form-profile"),
    imageDialog: $("#imageDialog"),
    imageForm: $("#imageForm"),
  };

  Profile.prototype.init = function () {
    var details = $("#profile-box");
    $("#btnUpdate").click(function (e) {
      e.preventDefault();
      elements.form.submit();
    });

    details.find(".imageButton").click(function (e) {
      showChangeImage(e);
    });

    details.find(".removeImageButton").click(function (e) {
      PerformAsyncAction(
        $(this),
        getSubmitCallback(options.actions.removeImage),
        $("#removeImageIndicator")
      );
    });

    $(".save").click(function () {
      $(this).closest("form").submit();
    });

    $(".cancel").click(function () {
      $(this).closest(".modal").modal("hide");
    });

    elements.form.bind("onValidationFailed", onValidationFailed);

    var imageSaveErrorHandler = function (result) {
      alert(result);
    };

    ConfigureAsyncForm(
      elements.imageForm,
      imageSubmitCallback(elements.imageForm),
      null,
      imageSaveErrorHandler
    );
    ConfigureAsyncForm(
      elements.form,
      defaultSubmitCallback,
      successHandler,
      null,
      { onBeforeSubmit: onBeforeSubmit }
    );
  };

  var showChangeImage = function (e) {
    elements.imageDialog.modal("show");
  };

  var getSubmitCallback = function (action) {
    return function () {
      return options.submitUrl + "?action=" + action;
    };
  };

  var imageSubmitCallback = function (form) {
    return function () {
      return options.submitUrl + "?action=" + form.attr("ajaxAction");
    };
  };

  var defaultSubmitCallback = function (form) {
    return form.attr("action") + "?action=" + form.attr("ajaxAction");
  };

  function onValidationFailed(event, data) {
    elements.form.find("button").removeAttr("disabled");
    hideModal();
    $("#validationErrors").removeClass("hidden");
  }

  function successHandler(response) {
    hideModal();
    $("#profileUpdatedMessage").removeClass("hidden");
  }

  function onBeforeSubmit(formData, jqForm, opts) {
    var bv = jqForm.data("bootstrapValidator");

    if (!bv.isValid() && bv.$invalidFields.length > 0) {
      return false;
    }

    $("#profileUpdatedMessage").addClass("hidden");

    $.blockUI({ message: $("#wait-box") });

    return true;
  }

  function hideModal() {
    $.unblockUI();

    var top = $("#profile-box").scrollTop();
    $("html, body").animate({ scrollTop: top }, "slow");
  }
}
