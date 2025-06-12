import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { tap } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private apiUrl = 'http://localhost:8000/api';
  redirectUrl: string | null = null;

  constructor(
    private http: HttpClient,
    private router: Router
  ) {}

  login(credentials: {email: string, password: string}) {
    return this.http.post<{token: string}>(`${this.apiUrl}/login`, credentials)
      .pipe(
        tap(response => {
          if (response.token) {
            localStorage.setItem('token', response.token);
            this.router.navigate([this.redirectUrl || '/dashboard']);
          }
        })
      );
  }

  logout() {
    localStorage.removeItem('token');
    this.router.navigate(['/login']);
  }

  isAuthenticated(): boolean {
    return !!localStorage.getItem('token');
  }
}