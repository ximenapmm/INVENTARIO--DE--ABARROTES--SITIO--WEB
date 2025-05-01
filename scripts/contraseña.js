document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const errorMessage = document.getElementById('error-message');
    const passwordInput = document.getElementById('pass');
    const confirmPasswordInput = document.getElementById('confirm-pass');
    
    // Validación de contraseñas al enviar el formulario
    form.addEventListener('submit', function(e) {
        // Validar que las contraseñas coincidan
        if (passwordInput.value !== confirmPasswordInput.value) {
            e.preventDefault(); // Detener el envío del formulario
            showError('Las contraseñas no coinciden');
            confirmPasswordInput.focus();
            return false;
        }
        
        // Validar longitud mínima de contraseña
        if (passwordInput.value.length < 8) {
            e.preventDefault();
            showError('La contraseña debe tener al menos 8 caracteres');
            passwordInput.focus();
            return false;
        }
        
        // Si todo está correcto, se envía el formulario
        return true;
    });
    
    // Validación en tiempo real mientras se escribe
    confirmPasswordInput.addEventListener('input', function() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.setCustomValidity('Las contraseñas no coinciden');
            showError('Las contraseñas no coinciden');
        } else {
            confirmPasswordInput.setCustomValidity('');
            hideError();
        }
    });
    
    // Función para mostrar mensajes de error
    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.style.display = 'block';
    }
    
    // Función para ocultar mensajes de error
    function hideError() {
        errorMessage.style.display = 'none';
    }
    
    // Barra de fortaleza de contraseña (opcional)
    passwordInput.addEventListener('input', function() {
        const strengthBars = document.querySelectorAll('.admin-register-strength-bar');
        const strength = calculatePasswordStrength(this.value);
        
        strengthBars.forEach((bar, index) => {
            if (index < strength) {
                bar.style.backgroundColor = getStrengthColor(strength);
            } else {
                bar.style.backgroundColor = '#e0e0e0';
            }
        });
    });
    
    function calculatePasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength++;
        if (/\d/.test(password)) strength++;
        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
        return Math.min(strength, 3);
    }
    
    function getStrengthColor(strength) {
        const colors = ['#e74c3c', '#f39c12', '#27ae60'];
        return colors[strength - 1] || '#e0e0e0';
    }
});