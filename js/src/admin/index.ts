import app from 'flarum/admin/app';

app.initializers.add('blomstra/flarum-sendgrid', () => {
  console.log('[blomstra/flarum-sendgrid] Hello, admin!');
});
