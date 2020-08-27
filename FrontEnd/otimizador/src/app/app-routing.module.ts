import { LoginComponent } from './auth/login/login.component';
import { HomeComponent } from './home/home.component';

import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';


const routes: Routes = [
  { path: '' , component: HomeComponent},
  { path: 'login' , component: LoginComponent},
  { path: 'usuarios', loadChildren: () => import('./usuarios/usuarios.module').then(m => m.UsuariosModule)},
  { path: 'controles', loadChildren: () => import('./controles/controles.module').then(m => m.ControlesModule)},
  { path: 'observacoes', loadChildren: () => import('./observacoes/observacoes.module').then(m => m.ObservacoesModule)},
  { path: 'importador', loadChildren: () => import('./importador/importador.module').then(m => m.ImportadorModule)},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
