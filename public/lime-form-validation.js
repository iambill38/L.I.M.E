// ===== LIME COMPLETE VALIDATION SYSTEM =====
// All-in-one form validation for Login, Signup, and Profile
// INCLUDES: FormValidator class + All validation rules + Auto-setup
// Just include this ONE file in: LIMELOGIN.html, LIMESIGNUP.html, LIMEPROFILE.html

// ===== FORM VALIDATOR CLASS =====
class FormValidator {
  constructor(formSelector, config = {}) {
    this.form = document.querySelector(formSelector);
    if (!this.form) return;

    this.config = {
      realTime: config.realTime !== false,
      showErrors: config.showErrors !== false,
      disableSubmit: config.disableSubmit !== false,
      ...config,
    };

    this.submitButton = this.form.querySelector('[type="submit"]');
    this.fields = {};
    this.isValid = false;

    this.setupValidation();
  }

  defineField(fieldName, rules) {
    this.fields[fieldName] = {
      element: this.form.querySelector(`[name="${fieldName}"]`),
      rules: rules,
      isValid: false,
      errorElement: null,
    };

    if (!this.fields[fieldName].element) {
      return;
    }

    this.createErrorElement(fieldName);

    if (this.config.realTime) {
      this.fields[fieldName].element.addEventListener('input', () =>
        this.validateField(fieldName)
      );
      this.fields[fieldName].element.addEventListener('blur', () =>
        this.validateField(fieldName)
      );
    }
  }

  createErrorElement(fieldName) {
    const field = this.fields[fieldName];
    const errorEl = document.createElement('div');
    errorEl.className = 'form-error-message';
    errorEl.style.cssText = `
      font-size: 0.8rem;
      color: #ff4141;
      margin-top: 0.35rem;
      display: none;
      font-weight: 500;
    `;
    field.element.parentNode.insertBefore(errorEl, field.element.nextSibling);
    field.errorElement = errorEl;
  }

  validateField(fieldName) {
    const field = this.fields[fieldName];
    if (!field) return false;

    const value = field.element.value.trim();
    let error = null;

    for (const rule of field.rules) {
      const result = rule.validate(value, this.form);
      if (result !== true) {
        error = result;
        break;
      }
    }

    field.isValid = error === null;
    this.updateFieldUI(fieldName, error);
    this.updateFormValidity();

    return field.isValid;
  }

  updateFieldUI(fieldName, error) {
    const field = this.fields[fieldName];

    if (field.isValid) {
      field.element.style.borderColor = 'rgba(0, 255, 65, 0.3)';
      field.element.style.background = 'rgba(0, 255, 65, 0.05)';
      if (field.errorElement) {
        field.errorElement.style.display = 'none';
      }
    } else {
      field.element.style.borderColor = 'rgba(255, 65, 65, 0.5)';
      field.element.style.background = 'rgba(255, 65, 65, 0.05)';
      if (field.errorElement && this.config.showErrors) {
        field.errorElement.textContent = error;
        field.errorElement.style.display = 'block';
      }
    }
  }

  updateFormValidity() {
    this.isValid = Object.values(this.fields).every((f) => f.isValid);

    if (this.config.disableSubmit && this.submitButton) {
      this.submitButton.disabled = !this.isValid;
      this.submitButton.style.opacity = this.isValid ? '1' : '0.5';
      this.submitButton.style.cursor = this.isValid ? 'pointer' : 'not-allowed';
    }
  }

  validateForm() {
    let isFormValid = true;
    for (const fieldName of Object.keys(this.fields)) {
      if (!this.validateField(fieldName)) {
        isFormValid = false;
      }
    }
    return isFormValid;
  }

  setupValidation() {
    this.form.addEventListener('submit', (e) => {
      e.preventDefault();

      if (!this.validateForm()) {
        showToast('Please fix the errors in the form', 'error');
        return;
      }

      if (this.config.onSubmit) {
        this.config.onSubmit(this.form);
      } else {
        showToast('Form submitted successfully!', 'success');
      }
    });
  }
}

// ===== ALL VALIDATION RULES =====
const ValidationRules = {
  required: {
    validate: (value) => {
      if (!value) return 'This field is required';
      return true;
    },
  },

  email: {
    validate: (value) => {
      if (!value) return 'Email is required';
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) return 'Please enter a valid email';
      return true;
    },
  },

  password: {
    validate: (value) => {
      if (!value) return 'Password is required';
      if (value.length < 8) return 'Password must be at least 8 characters';
      if (!/[a-z]/.test(value)) return 'Password must contain lowercase letters';
      if (!/[A-Z]/.test(value)) return 'Password must contain uppercase letters';
      if (!/[0-9]/.test(value)) return 'Password must contain numbers';
      return true;
    },
  },

  passwordWeak: {
    validate: (value) => {
      if (!value) return 'Password is required';
      if (value.length < 8) return 'Password must be at least 8 characters';
      return true;
    },
  },

  passwordMatch: (otherFieldName) => ({
    validate: (value, form) => {
      const otherField = form.querySelector(`[name="${otherFieldName}"]`);
      if (!otherField) return true;
      if (value !== otherField.value) return 'Passwords do not match';
      return true;
    },
  }),

  minLength: (length) => ({
    validate: (value) => {
      if (!value) return `This field is required`;
      if (value.length < length) return `Must be at least ${length} characters`;
      return true;
    },
  }),

  maxLength: (length) => ({
    validate: (value) => {
      if (value.length > length) return `Maximum ${length} characters allowed`;
      return true;
    },
  }),

  name: {
    validate: (value) => {
      if (!value) return 'Name is required';
      if (value.length < 2) return 'Name must be at least 2 characters';
      if (!/^[a-zA-Z\s'-]+$/.test(value))
        return 'Name can only contain letters, spaces, hyphens, and apostrophes';
      return true;
    },
  },

  url: {
    validate: (value) => {
      if (!value) return 'URL is required';
      try {
        new URL(value);
        return true;
      } catch {
        return 'Please enter a valid URL (e.g., https://example.com)';
      }
    },
  },

  urlOptional: {
    validate: (value) => {
      if (!value) return true;
      try {
        new URL(value);
        return true;
      } catch {
        return 'Please enter a valid URL';
      }
    },
  },
};

// ===== AUTO-SETUP FOR ALL FORMS =====
// This runs automatically when the page loads
// No additional setup needed!

function initializeValidation() {
  // LOGIN FORM VALIDATION
  const loginForm = document.querySelector('form.auth-form');
  if (loginForm) {
    const loginValidator = new FormValidator('form.auth-form');
    loginValidator.defineField('email', [ValidationRules.email]);
    loginValidator.defineField('password', [ValidationRules.passwordWeak]);
  }

  // SIGNUP FORM VALIDATION
  const signupForm = document.querySelector('form.signup-form');
  if (signupForm) {
    const signupValidator = new FormValidator('form.signup-form');
    signupValidator.defineField('first_name', [ValidationRules.name]);
    signupValidator.defineField('last_name', [ValidationRules.name]);
    signupValidator.defineField('email', [ValidationRules.email]);
    signupValidator.defineField('password', [ValidationRules.password]);
    signupValidator.defineField('confirm_password', [
      ValidationRules.passwordMatch('password'),
    ]);
  }

  // PROFILE FORM VALIDATION
  const profileForm = document.querySelector('#profileForm');
  if (profileForm) {
    const profileValidator = new FormValidator('#profileForm');
    profileValidator.defineField('first-name', [ValidationRules.name]);
    profileValidator.defineField('last-name', [ValidationRules.name]);
    profileValidator.defineField('email', [ValidationRules.email]);
    profileValidator.defineField('bio', [ValidationRules.maxLength(500)]);
    profileValidator.defineField('linkedin', [ValidationRules.urlOptional]);
    profileValidator.defineField('github', [ValidationRules.urlOptional]);
    profileValidator.defineField('portfolio', [ValidationRules.urlOptional]);
    profileValidator.defineField('twitter', [ValidationRules.urlOptional]);
  }
}

// Run on page load
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initializeValidation);
} else {
  initializeValidation();
}