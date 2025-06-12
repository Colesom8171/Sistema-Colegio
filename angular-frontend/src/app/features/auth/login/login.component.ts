import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AuthService } from '../../../core/services/auth.service';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  template: `
    <div class="login-container">
      <form [formGroup]="loginForm" (ngSubmit)="onSubmit()">
        <div class="form-group">
          <input type="email" formControlName="email" placeholder="Email" class="form-control">
          <div *ngIf="loginForm.get('email')?.errors?.['required'] && loginForm.get('email')?.touched">
            El email es requerido
          </div>
          <div *ngIf="loginForm.get('email')?.errors?.['email'] && loginForm.get('email')?.touched">
            Ingrese un email válido
          </div>
        </div>
        <div class="form-group">
          <input type="password" formControlName="password" placeholder="Contraseña" class="form-control">
          <div *ngIf="loginForm.get('password')?.errors?.['required'] && loginForm.get('password')?.touched">
            La contraseña es requerida
          </div>
        </div>
        <button type="submit" [disabled]="!loginForm.valid">Iniciar Sesión</button>
      </form>
    </div>
  `,
  
})
export class LoginComponent {
  loginForm: FormGroup;

  constructor(
    private fb: FormBuilder,
    private authService: AuthService
  ) {
    this.loginForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required]
    });
  }

  onSubmit() {
    if (this.loginForm.valid) {
      this.authService.login(this.loginForm.value).subscribe({
        error: (error) => {
          console.error('Error en el login:', error);
          // Aquí puedes agregar lógica para mostrar el error al usuario
        }
      });
    }
  }
}