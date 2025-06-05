# PHP Tech Blog

一个现代化的PHP个人博客系统，具有简洁大方的设计风格和完整的后台管理功能。

## 功能特点

- 响应式设计，支持移动端访问
- 文章管理（发布、编辑、删除）
- 分类和标签管理
- 用户认证和授权
- 评论系统
- 搜索功能
- SEO友好

## 技术栈

- PHP 8.x
- MySQL 5.7+
- Slim Framework 4
- Bootstrap 5
- Twig Template Engine

## 安装要求

- PHP >= 8.0
- MySQL >= 5.7
- Composer
- Apache/Nginx

## 安装步骤

1. 克隆仓库：
```bash
git clone https://github.com/yourusername/php-tech-blog.git
cd php-tech-blog
```

2. 安装依赖：
```bash
composer install
```

3. 配置环境：
```bash
cp .env.example .env
```
编辑 `.env` 文件，设置数据库连接信息和其他配置。

4. 创建数据库：
```sql
CREATE DATABASE tech_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

5. 运行数据库迁移：
```bash
php database/migrations.sql
```

6. 配置Web服务器：
- 将网站根目录指向 `public` 文件夹
- 确保 `storage` 目录可写

## 开发

1. 启动开发服务器：
```bash
php -S localhost:8000 -t public
```

2. 访问网站：
打开浏览器访问 `http://localhost:8000`

## 目录结构

```
├── config/             # 配置文件
├── database/           # 数据库迁移和种子
├── public/            # 公共文件
│   ├── css/          # CSS文件
│   ├── js/           # JavaScript文件
│   └── images/       # 图片文件
├── src/              # 源代码
│   ├── Controllers/  # 控制器
│   ├── Models/       # 模型
│   └── Views/        # 视图
└── vendor/           # Composer依赖
```

## 贡献

欢迎提交问题和拉取请求。

## 许可证

MIT License 