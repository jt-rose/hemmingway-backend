// set up policy name for cors
var  MyAllowSpecificOrigins = "_myAllowSpecificOrigins";

var builder = WebApplication.CreateBuilder(args);

// specify approved cors endpoints
builder.Services.AddCors(options =>
{
    options.AddPolicy(name: MyAllowSpecificOrigins,
                      builder =>
                      {
                          builder.WithOrigins("http://localhost:3000",
                                              "https://hemmingway-frontend.vercel.app")
                                              .AllowAnyHeader()
                                                .AllowAnyMethod();
                      });
});


builder.Services
    .AddGraphQLServer()
    .AddQueryType<Query>();


var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    // app.UseSwagger();
    // app.UseSwaggerUI();
}

// app.UseHttpsRedirection();

// enable cors
app.UseCors(MyAllowSpecificOrigins);

// app.UseAuthorization();

// app.MapControllers();

app.MapGet("/", () => "Hello World!");

app.MapGraphQL();

app.Run();
